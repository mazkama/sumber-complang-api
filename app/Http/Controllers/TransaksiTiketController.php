<?php

namespace App\Http\Controllers;

use PDF;
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
            $jenisFilter = $request->query('jenis'); // nilai: semua | kolam | parkir
            $statusFilter = $request->query('status'); // nilai: all | reserved

            // Query dasar - cek role user
            if ($user->role === 'pengunjung') {
                // Jika pengunjung, hanya tampilkan transaksi milik user tersebut
                $query = TransaksiTiket::where('id_user', $user->id_user)->latest();
                Log::info('User pengunjung melihat transaksi sendiri', ['user_id' => $user->id_user]);
            } else {
                // Jika admin/petugas, tampilkan semua transaksi
                $query = TransaksiTiket::latest();
                Log::info('petugas melihat semua transaksi', ['user_role' => $user->role]);
            }

            // Filter berdasarkan jenis tiket jika diperlukan
            if (in_array($jenisFilter, ['kolam', 'parkir'])) {
                $query->whereHas('detailTransaksiTiket.tiket', function ($q) use ($jenisFilter) {
                    $q->where('jenis', $jenisFilter);
                });
            }

            // Filter berdasarkan status transaksi
            if ($statusFilter === 'reserved') {
                $query->whereIn('status', ['selesai', 'divalidasi']);
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

                // Tambahkan informasi user jika bukan pengunjung
                if (Auth::user()->role !== 'pengunjung') {
                    $item->customer_info = [
                        'name' => $item->user->name ?? 'Unknown',
                        'username' => $item->user->username ?? 'Unknown',
                    ];
                }

                // Hapus relasi dari output
                unset($item->detailTransaksiTiket);
                unset($item->user);

                return $item;
            });

            return response()->json([
                'success' => true,
                'message' => 'Daftar transaksi berhasil diambil.',
                'data' => $transaksi,
                'filters_applied' => [
                    'jenis' => $jenisFilter ?? 'semua',
                    'status' => $statusFilter ?? 'all',
                    'view_mode' => $user->role === 'pengunjung' ? 'personal' : 'all',
                ],
            ]);
        } catch (\Exception $e) {
            Log::error('Error fetching transactions', [
                'error_message' => $e->getMessage(),
                'user_id' => Auth::id(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Gagal mengambil data transaksi: ' . $e->getMessage(),
                ],
                500,
            );
        }
    }

    public function exportMonthlyReport(Request $request)
    {
        try {
            // Set timezone untuk Indonesia
            date_default_timezone_set('Asia/Jakarta');

            // Dapatkan bulan, tahun, dan jenis filter
            $month = $request->get('bulan', date('m'));
            $year = $request->get('tahun', date('Y'));
            $jenisFilter = $request->get('jenis', 'semua'); // Tambahkan filter jenis tiket

            // Format nama bulan untuk display
            $bulanIndonesia = [
                '01' => 'Januari',
                '02' => 'Februari',
                '03' => 'Maret',
                '04' => 'April',
                '05' => 'Mei',
                '06' => 'Juni',
                '07' => 'Juli',
                '08' => 'Agustus',
                '09' => 'September',
                '10' => 'Oktober',
                '11' => 'November',
                '12' => 'Desember',
            ];

            $namaBulan = $bulanIndonesia[$month] ?? 'Unknown';

            // Query untuk mengambil transaksi
            $query = TransaksiTiket::with(['user', 'detailTransaksiTiket.tiket'])
                ->whereIn('status', ['selesai', 'dibayar', 'divalidasi'])
                ->whereYear('created_at', $year)
                ->whereMonth('created_at', $month);

            // Filter berdasarkan jenis tiket jika diperlukan
            if (in_array($jenisFilter, ['kolam', 'parkir'])) {
                $query->whereHas('detailTransaksiTiket.tiket', function ($q) use ($jenisFilter) {
                    $q->where('jenis', $jenisFilter);
                });
            }

            $transactions = $query->orderBy('created_at', 'desc')->get();

            // Hitung jumlah transaksi per status
            $countByStatus = [
                'selesai' => $transactions->where('status', 'selesai')->count(),
                'dibayar' => $transactions->where('status', 'dibayar')->count(),
                'divalidasi' => $transactions->where('status', 'divalidasi')->count(),
            ];

            // Hitung jumlah tiket per transaksi dan total keseluruhan
            $ticketCounts = [];
            $totalTickets = [
                'kolam' => 0,
                'parkir' => 0,
                'total' => 0,
            ];

            foreach ($transactions as $transaction) {
                $ticketCounts[$transaction->id_transaksi_tiket] = [
                    'kolam' => 0,
                    'parkir' => 0,
                    'total' => 0,
                ];

                foreach ($transaction->detailTransaksiTiket as $detail) {
                    $jenis = $detail->tiket->jenis ?? 'unknown';

                    if (in_array($jenis, ['kolam', 'parkir'])) {
                        $ticketCounts[$transaction->id_transaksi_tiket][$jenis] += $detail->jumlah;
                        $ticketCounts[$transaction->id_transaksi_tiket]['total'] += $detail->jumlah;
                        $totalTickets[$jenis] += $detail->jumlah;
                        $totalTickets['total'] += $detail->jumlah;
                    }
                }
            }

            // Hitung total omset
            $totalOmset = $transactions->sum('total_harga');

            // Generate PDF
            $pdf = PDF::loadView('export', [
                'transactions' => $transactions,
                'countByStatus' => $countByStatus,
                'ticketCounts' => $ticketCounts,
                'totalTickets' => $totalTickets,
                'totalOmset' => $totalOmset,
                'bulan' => $namaBulan,
                'tahun' => $year,
                'jenisFilter' => $jenisFilter,
            ]);

            // Set paper size dan orientation
            $pdf->setPaper('a4', 'landscape');

            // Download PDF dengan nama yang sesuai
            $jenisText = $jenisFilter != 'semua' ? ucfirst($jenisFilter) . '_' : '';
            return $pdf->download("Laporan_Transaksi_{$jenisText}{$namaBulan}_{$year}.pdf");
        } catch (\Exception $e) {
            Log::error('Error generating PDF report', [
                'error_message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json(
                [
                    'success' => false,
                    'message' => 'Gagal membuat laporan PDF: ' . $e->getMessage(),
                ],
                500,
            );
        }
    }

    // Create a new transaction for tickets with Xendit integration
    public function createTransaction(Request $request, XenditService $xendit)
    {
        Log::info('data transaksi masuk', $request->all());
        try {
            // Validasi request (Updated validation)
            $validated = $request->validate([
                'metode_pembayaran' => 'required|in:ewallet,tunai',
                'tiket_details' => 'required|array|min:1',
                'tiket_details.*.id_tiket' => 'required|exists:tiket,id_tiket',
                'tiket_details.*.jumlah' => 'required|integer|min:1',
                'tiket_details.*.no_kendaraan' => 'nullable|string|max:20', // Add vehicle number validation
            ]);

            $user = Auth::user();
            $orderId = 'ORDER-' . time();

            $totalHarga = 0;
            $detailTransaksi = [];

            foreach ($request->tiket_details as $detail) {
                $tiket = Tiket::find($detail['id_tiket']);
                $subtotal = $tiket->harga * $detail['jumlah'];
                $totalHarga += $subtotal;

                // Add no_kendaraan to detail if provided
                $detailItem = [
                    'id_tiket' => $tiket->id_tiket,
                    'nama_tiket' => $tiket->nama_tiket,
                    'harga_satuan' => $tiket->harga,
                    'jumlah' => $detail['jumlah'],
                    'subtotal' => $subtotal,
                ];
                
                // Add vehicle number if it exists
                if (isset($detail['no_kendaraan'])) {
                    $detailItem['no_kendaraan'] = $detail['no_kendaraan'];
                }
                
                $detailTransaksi[] = $detailItem;
            }

            // Simpan transaksi utama
            $transaksi = TransaksiTiket::create([
                'id_user' => $user->id_user,
                'total_harga' => $totalHarga,
                'metode_pembayaran' => $request->metode_pembayaran,
                'status' => $request->metode_pembayaran == 'ewallet' ? 'menunggu' : 'dibayar',
                'order_id' => $orderId,
            ]);

            // Simpan detail transaksi (Updated to include no_kendaraan)
            foreach ($detailTransaksi as $detail) {
                $detailData = [
                    'id_transaksi_tiket' => $transaksi->id_transaksi_tiket,
                    'id_tiket' => $detail['id_tiket'],
                    'jumlah' => $detail['jumlah'],
                    'subtotal' => $detail['subtotal'],
                ];
                
                // Add no_kendaraan to database record if it exists
                if (isset($detail['no_kendaraan'])) {
                    $detailData['no_kendaraan'] = $detail['no_kendaraan'];
                }
                
                DetailTransaksiTiket::create($detailData);
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
                    'username' => $user->usernanme,
                ],
                'detail_transaksi' => $detailTransaksi,
            ];

            // Jika metode ewallet, proses ke Xendit (QRIS)
            if ($request->metode_pembayaran === 'ewallet') {
                // Prepare parameter invoice Xendit
                $params = [
                    'external_id' => $orderId,
                    'amount' => $totalHarga,
                    'payer_email' => "$user->username@sumbercomplang.com",
                    'invoice_duration' => 30,
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
            }else{
                // Jika metode tunai
                $transaksi->status = 'selesai'; // Set status selesai untuk transaksi tunai
                $transaksi->save();
                
                return response()->json(
                    [
                        'success' => true,
                        'message' => 'Transaksi tunai berhasil dibuat dan selesai.',
                        'data' => $responseData,
                    ],
                    201,
                );
            }
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
            // Enhanced logging
            Log::error('Transaction creation failed', [
                'error_message' => $e->getMessage(),
                'error_code' => $e->getCode(),
                'error_file' => $e->getFile(),
                'error_line' => $e->getLine(),
                'request_data' => $request->all(),
                'user_id' => Auth::id(),
            ]);
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
                        'username' => $transaksi->user->username,
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
                    'id_dt_transaksi' => $item->id_detail_transaksi_tiket,
                    'id_tiket' => $item->id_tiket,
                    'nama_tiket' => $item->tiket->nama_tiket,
                    'jenis_tiket' => $item->tiket->jenis, // Added ticket type
                    'harga' => $item->tiket->harga,
                    'jumlah' => $item->jumlah,
                    'subtotal' => $item->subtotal,
                    'no_kendaraan' => $item->no_kendaraan ?? null,
                    'waktu_validasi' => $item->waktu_validasi
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
                        'username' => $transaksi->user->username,
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
                return response()->json(
                    [
                        'success' => false,
                        'message' => 'Transaksi tidak ditemukan.',
                    ],
                    404,
                );
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
            return response()->json(
                [
                    'success' => false,
                    'message' => 'Terjadi kesalahan: ' . $e->getMessage(),
                ],
                500,
            );
        }
    }

    public function validatePartialTickets(Request $request)
    {

        Log::info('data transaksi masuk', $request->all());
        try {
            // Validate request
            $validated = $request->validate([
                'order_id' => 'required|string|exists:transaksi_tiket,order_id',
                'ticket_ids' => 'required|array|min:1',
                'ticket_ids.*' => 'required|integer|exists:detail_transaksi_tiket,id_detail_transaksi_tiket',
            ]);

            // Find transaction by order ID
            $transaksi = TransaksiTiket::with('detailTransaksiTiket')
                ->where('order_id', $request->order_id)
                ->firstOrFail();
            
            // Validate only specific tickets
            $ticketCount = 0;
            $now = now();
            
            foreach ($request->ticket_ids as $detailId) {
                $detailTicket = DetailTransaksiTiket::where('id_detail_transaksi_tiket', $detailId)
                    ->where('id_transaksi_tiket', $transaksi->id_transaksi_tiket)
                    ->first();
                
                if ($detailTicket) {
                    // Only update if not already validated
                    if (!$detailTicket->waktu_validasi) {
                        $detailTicket->waktu_validasi = $now;
                        $detailTicket->save();
                        $ticketCount++;
                    }
                }
            }
            
            // Update main transaction status
            $transaksi->status = 'divalidasi';
            $transaksi->id_divalidasi_oleh = auth()->id();
            
            // Check if all detail tickets now have waktu_validasi
            $allValidated = $transaksi->detailTransaksiTiket()
                ->whereNull('waktu_validasi')
                ->count() === 0;
            
            if ($allValidated) {
                $transaksi->status = 'selesai';
            }
            
            $transaksi->save();
            
            // Prepare response with validated tickets
            $validatedDetails = DetailTransaksiTiket::with('tiket')
                ->whereIn('id_detail_transaksi_tiket', $request->ticket_ids)
                ->get()
                ->map(function ($item) {
                    return [
                        'id_detail' => $item->id_detail_transaksi_tiket,
                        'id_tiket' => $item->id_tiket,
                        'nama_tiket' => $item->tiket->nama_tiket,
                        'jenis_tiket' => $item->tiket->jenis,
                        'harga' => $item->tiket->harga,
                        'jumlah' => $item->jumlah,
                        'subtotal' => $item->subtotal,
                        'no_kendaraan' => $item->no_kendaraan ?? null,
                        'waktu_validasi' => $item->waktu_validasi,
                    ];
                });
            
            return response()->json([
                'success' => true,
                'message' => $ticketCount > 0 
                    ? "Berhasil memvalidasi {$ticketCount} tiket." 
                    : "Semua tiket sudah divalidasi sebelumnya.",
                'data' => [
                    'order_id' => $transaksi->order_id,
                    'status' => $transaksi->status,
                    'all_validated' => $allValidated,
                    'validated_tickets' => $validatedDetails,
                ]
            ]);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal',
                'errors' => $e->errors()
            ], 422);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memvalidasi tiket.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
