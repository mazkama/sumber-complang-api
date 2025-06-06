<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\TransaksiTiket;
use App\Models\DetailTransaksiTiket;
use App\Models\Tiket;
use Midtrans\Snap;
use Midtrans\Config;
use Midtrans\Notification;
use App\Services\XenditService;

class TransaksiTiketController extends Controller
{
    public function index(Request $request)
    {
        try {
            $user = Auth::user();
            $filter = $request->query('jenis'); // nilai: semua | kolam | parkir

            // Query dasar
            $query = TransaksiTiket::where('id_user', $user->id_user)->latest();

            // Filter berdasarkan jenis tiket jika diperlukan
            if (in_array($filter, ['kolam', 'parkir'])) {
                $query->whereHas('detailTransaksiTiket.tiket', function ($q) use ($filter) {
                    $q->where('jenis', $filter);
                });
            }

            // Ambil data transaksi + relasi (untuk internal pemrosesan)
            $transaksi = $query->with('detailTransaksiTiket.tiket')->paginate(10);

            // Transformasi data untuk menambahkan jenis_transaksi dan menghapus relasi
            $transaksi->getCollection()->transform(function ($item) {
                $jenisList = $item->detailTransaksiTiket->pluck('tiket.jenis')->unique()->values();

                if ($jenisList->count() > 1) {
                    $item->jenis_transaksi = 'campuran';
                } else {
                    $item->jenis_transaksi = $jenisList->first(); // "kolam" atau "parkir"
                }

                // Hapus relasi dari output
                unset($item->detailTransaksiTiket);

                return $item;
            });

            return response()->json([
                'success' => true,
                'message' => 'Daftar transaksi berhasil diambil.',
                'data' => $transaksi,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data transaksi: ' . $e->getMessage(),
            ], 500);
        }
    } 

    // Create a new transaction for tickets with Xendit integration
    public function createTransaction(Request $request, XenditService $xendit)
    {
        try {
            // Validasi request
            $validated = $request->validate([
                'metode_pembayaran' => 'required|in:ewallet,tunai',
                'tiket_details' => 'required|array|min:1',
                'tiket_details.*.id_tiket' => 'required|exists:tiket,id_tiket',
                'tiket_details.*.jumlah' => 'required|integer|min:1',
            ]);

            $user = Auth::user();
            $orderId = 'ORDER-' . time();

            $totalHarga = 0;
            $detailTransaksi = [];

            foreach ($request->tiket_details as $detail) {
                $tiket = Tiket::find($detail['id_tiket']);
                $subtotal = $tiket->harga * $detail['jumlah'];
                $totalHarga += $subtotal;

                $detailTransaksi[] = [
                    'id_tiket' => $tiket->id_tiket,
                    'nama_tiket' => $tiket->nama_tiket,
                    'harga_satuan' => $tiket->harga,
                    'jumlah' => $detail['jumlah'],
                    'subtotal' => $subtotal,
                ];
            }

            // Simpan transaksi utama
            $transaksi = TransaksiTiket::create([
                'id_user' => $user->id_user,
                'total_harga' => $totalHarga,
                'metode_pembayaran' => $request->metode_pembayaran,
                'status' => $request->metode_pembayaran == 'ewallet' ? 'menunggu' : 'dibayar',
                'order_id' => $orderId,
            ]);

            // Simpan detail transaksi
            foreach ($detailTransaksi as $detail) {
                DetailTransaksiTiket::create([
                    'id_transaksi_tiket' => $transaksi->id_transaksi_tiket,
                    'id_tiket' => $detail['id_tiket'],
                    'jumlah' => $detail['jumlah'],
                    'subtotal' => $detail['subtotal'],
                ]);
            }

            $responseData = [
                'order_id' => $orderId,
                'status' => $transaksi->status,
                'tanggal' => $transaksi->created_at->format('Y-m-d H:i:s'),
                'payment_type' => $request->metode_pembayaran,
                'gross_amount' => $totalHarga,
                'user' => [
                    'id_user' => $user->id_user,
                    'name' => $user->name,
                    'email' => $user->email,
                ],
                'detail_transaksi' => $detailTransaksi,
            ];

            // Jika metode ewallet, proses ke Xendit (QRIS)
            if ($request->metode_pembayaran === 'ewallet') {
                // Prepare parameter invoice Xendit
                $params = [
                    'external_id' => $orderId,
                    'amount' => $totalHarga,
                    'payer_email' => $user->email,
                    'description' => 'Pembayaran tiket dengan order ID ' . $orderId,
                    // 'payment_methods' => ['CREDIT_CARD', 'BANK_TRANSFER', 'QRIS', 'EWALLET'],
                    'success_redirect_url' => url('/payment/success'),
                    'failure_redirect_url' => url('/payment/failure'),
                ];

                $invoice = $xendit->createInvoice($params);

                // Simpan redirect_url invoice ke database
                $transaksi->redirect_url = $invoice['invoice_url'] ?? null;
                $transaksi->save();

                $responseData['redirect_url'] = $invoice['invoice_url'] ?? null;

                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Transaksi berhasil dibuat, silakan lanjutkan pembayaran melalui QRIS.',
                        'data' => $responseData,
                    ],
                    201,
                );
            }

            // Jika metode tunai
            return response()->json(
                [
                    'success' => true,
                    'message' => 'Transaksi tunai berhasil dibuat.',
                    'data' => $responseData,
                ],
                201,
            );
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Validasi gagal',
                    'errors' => $e->errors(),
                ],
                422,
            );
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
                ],
                500,
            );
        }
    }

    public function xenditNotification(Request $request)
    {
        // Ambil token webhook dari header request
        $callbackToken = $request->header('X-Callback-Token');

        // Cek apakah token cocok dengan secret di .env
        if ($callbackToken !== env('XENDIT_WEBHOOK_SECRET')) {
            Log::warning('Webhook Xendit: Token tidak valid', ['token' => $callbackToken]);
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Log data payload untuk debugging
        Log::info('Notifikasi Xendit Masuk', $request->all());

        try {
            $data = $request->all();

            $external_id = $data['external_id'] ?? null;
            $status = $data['status'] ?? null;

            if (!$external_id || !$status) {
                Log::warning('Payload Xendit tidak lengkap', $data);
                return response()->json(['message' => 'Payload tidak lengkap'], 400);
            }

            // Cari transaksi berdasarkan order_id (external_id)
            $transaksi = TransaksiTiket::where('order_id', $external_id)->first();

            if (!$transaksi) {
                Log::warning("Transaksi dengan order_id $external_id tidak ditemukan");
                return response()->json(['message' => 'Transaksi tidak ditemukan'], 404);
            }

            // Update status transaksi sesuai status dari Xendit
            switch ($status) {
                case 'PAID':
                    $transaksi->status = 'dibayar';
                    break;
                case 'PENDING':
                    $transaksi->status = 'menunggu';
                    break;
                case 'EXPIRED':
                case 'FAILED':
                    $transaksi->status = 'dibatalkan';
                    break;
                default:
                    $transaksi->status = 'gagal';
                    break;
            }

            $transaksi->save();

            return response()->json(['status' => 'success'], 200);
        } catch (\Exception $e) {
            Log::error('Error notifikasi Xendit: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }


    public function notification(Request $request)
    {
        // Konfigurasi Midtrans
        Config::$serverKey = config('midtrans.server_key');
        Config::$isProduction = config('midtrans.is_production');
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // Logging untuk debug
        Log::info('Notifikasi Midtrans Masuk', $request->all());

        try {
            $notif = new Notification(); // Ambil data langsung dari body JSON

            $transaction_status = $notif->transaction_status;
            $order_id = $notif->order_id;

            Log::info("Order ID: $order_id, Status: $transaction_status");

            $transaksi = TransaksiTiket::where('order_id', $order_id)->first();

            if (!$transaksi) {
                return response()->json(
                    [
                        'message' => 'Transaksi tidak ditemukan',
                    ],
                    404,
                );
            }

            switch ($transaction_status) {
                case 'settlement':
                    $transaksi->status = 'dibayar';
                    break;
                case 'pending':
                    $transaksi->status = 'menunggu';
                    break;
                case 'cancel':
                case 'deny':
                case 'expire':
                    $transaksi->status = 'dibatalkan';
                    break;
                default:
                    $transaksi->status = 'gagal';
                    break;
            }

            $transaksi->save();

            return response()->json(['status' => 'success'], 200);
        } catch (\Exception $e) {
            Log::error('Midtrans Notification Error: ' . $e->getMessage());
            return response()->json(['status' => 'error', 'message' => $e->getMessage()], 500);
        }
    }

    public function finalTransaction($order_id)
    {
        // Validasi manual keberadaan order_id di tabel
        if (!TransaksiTiket::where('order_id', $order_id)->exists()) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Order ID tidak ditemukan.',
                ],
                404,
            );
        }

        try {
            $transaksi = TransaksiTiket::with(['user', 'detailTransaksiTiket.tiket'])
                ->where('order_id', $order_id)
                ->first();

            $detail = $transaksi->detailTransaksiTiket->map(function ($item) {
                return [
                    'id_tiket' => $item->id_tiket,
                    'nama_tiket' => $item->tiket->nama_tiket ?? '-',
                    'jumlah' => $item->jumlah,
                    'subtotal' => $item->subtotal,
                ];
            });

            return response()->json([
                'success' => true,
                'message' => 'Data transaksi berhasil diambil.',
                'data' => [
                    'order_id' => $transaksi->order_id,
                    'total_harga' => $transaksi->total_harga,
                    'metode_pembayaran' => $transaksi->metode_pembayaran,
                    'status' => $transaksi->status,
                    'tanggal' => $transaksi->created_at->format('Y-m-d H:i:s'),
                    'user' => [
                        'id_user' => $transaksi->user->id_user,
                        'nama' => $transaksi->user->name,
                        'email' => $transaksi->user->email,
                    ],
                    'detail_tiket' => $detail,
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
                ],
                500,
            );
        }
    }

    public function finish(Request $request)
    {
        // Contoh data yang mungkin dikirim oleh gateway pembayaran
        $transactionStatus = $request->input('transaction_status');
        $orderId = $request->input('order_id');
        $paymentType = $request->input('payment_type');
        $grossAmount = $request->input('gross_amount');

        return view('finish', [
            'transactionStatus' => $transactionStatus,
            'orderId' => $orderId,
            'paymentType' => $paymentType,
            'grossAmount' => $grossAmount,
        ]);
    }
    public function showTransactionDetail($orderId)
    {
        try {
            // Cari transaksi berdasarkan order_id
            $transaksi = TransaksiTiket::with(['user', 'detailTransaksiTiket.tiket'])
                ->where('order_id', $orderId)
                ->first();

            // Jika tidak ditemukan
            if (!$transaksi) {
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'Transaksi tidak ditemukan.',
                    ],
                    404,
                );
            }

            // Persiapkan detail transaksi
            $detail = $transaksi->detailTransaksiTiket->map(function ($item) {
                return [
                    'id_tiket' => $item->id_tiket,
                    'nama_tiket' => $item->tiket->nama_tiket,
                    'harga' => $item->tiket->harga,
                    'jumlah' => $item->jumlah,
                    'subtotal' => $item->subtotal,
                ];
            });

            // Bentuk response
            return response()->json([
                'success' => true,
                'message' => 'Detail transaksi berhasil diambil.',
                'data' => [
                    'order_id' => $transaksi->order_id,
                    'status' => $transaksi->status,
                    'tanggal' => $transaksi->created_at->format('Y-m-d H:i:s'),
                    'gross_amount' => $transaksi->total_harga,
                    'payment_type' => $transaksi->metode_pembayaran,
                    'customer' => [
                        'name' => $transaksi->user->name,
                        'email' => $transaksi->user->email,
                    ],
                    'detail_transaksi' => $detail,
                    'redirect_url' => $transaksi->redirect_url,
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
                ],
                500,
            );
        }
    }

    public function cancelTransaction($orderId)
    {
        try {
            // Cari transaksi berdasarkan order_id
            $transaksi = TransaksiTiket::where('order_id', $orderId)->first();

            if (!$transaksi) {
                return response()->json([
                    'success' => false,
                    'message' => 'Transaksi tidak ditemukan.',
                ], 404);
            }

            // Update status transaksi menjadi "dibatalkan"
            $transaksi->status = 'dibatalkan';
            $transaksi->save();

            return response()->json([
                'success' => true,
                'message' => 'Transaksi berhasil dibatalkan.',
                'data' => [
                    'order_id' => $transaksi->order_id,
                    'status' => $transaksi->status,
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
            ], 500);
        }
    }

}
