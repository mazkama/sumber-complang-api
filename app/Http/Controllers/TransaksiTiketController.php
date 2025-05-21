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

class TransaksiTiketController extends Controller
{
    // public function createTransaction(Request $request)
    // {
    //     try {
    //         // Validasi request
    //         $validated = $request->validate([
    //             'metode_pembayaran' => 'required|in:ewallet,tunai',
    //             'tiket_details' => 'required|array|min:1',
    //             'tiket_details.*.id_tiket' => 'required|exists:tiket,id_tiket',
    //             'tiket_details.*.jumlah' => 'required|integer|min:1',
    //         ]);

    //         $user = Auth::user();
    //         $orderId = 'ORDER-' . time();

    //         $totalHarga = 0;
    //         $detailTransaksi = [];

    //         foreach ($request->tiket_details as $detail) {
    //             $tiket = Tiket::find($detail['id_tiket']);
    //             $subtotal = $tiket->harga * $detail['jumlah'];
    //             $totalHarga += $subtotal;

    //             $detailTransaksi[] = [
    //                 'id_tiket' => $tiket->id_tiket,
    //                 'jumlah' => $detail['jumlah'],
    //                 'subtotal' => $subtotal,
    //             ];
    //         }

    //         // Simpan transaksi utama
    //         $transaksi = TransaksiTiket::create([
    //             'id_user' => $user->id_user,
    //             'total_harga' => $totalHarga,
    //             'metode_pembayaran' => $request->metode_pembayaran,
    //             'status' => $request->metode_pembayaran == 'ewallet' ? 'menunggu' : 'dibayar',
    //             'order_id' => $orderId,
    //         ]);

    //         // Simpan detail transaksi
    //         foreach ($detailTransaksi as $detail) {
    //             $detail['id_transaksi_tiket'] = $transaksi->id_transaksi_tiket;
    //             DetailTransaksiTiket::create($detail);
    //         }

    //         // Jika metode ewallet, proses ke Midtrans
    //         if ($request->metode_pembayaran === 'ewallet') {
    //             Config::$serverKey = env('MIDTRANS_SERVER_KEY');
    //             Config::$clientKey = env('MIDTRANS_CLIENT_KEY');

    //             $item_details = array_map(function ($item) {
    //                 $tiket = Tiket::find($item['id_tiket']);
    //                 return [
    //                     'id' => $item['id_tiket'],
    //                     'price' => $item['subtotal'],
    //                     'quantity' => $item['jumlah'],
    //                     'name' => $tiket->nama_tiket,
    //                 ];
    //             }, $detailTransaksi);

    //             $transaction_data = [
    //                 'transaction_details' => [
    //                     'order_id' => $orderId,
    //                     'gross_amount' => $totalHarga,
    //                 ],
    //                 'item_details' => $item_details,
    //                 'customer_details' => [
    //                     'first_name' => $user->name,
    //                     'email' => $user->email,
    //                 ],
    //                 'callbacks' => [
    //                     'finish' => url('/payment/finish'),
    //                 ],
    //             ];

    //             $snapTransaction = Snap::createTransaction($transaction_data);

    //             return response()->json([
    //                 'success' => true,
    //                 'message' => 'Transaksi berhasil dibuat, silakan lanjutkan pembayaran',
    //                 'data' => [
    //                     'order_id' => $orderId,
    //                     'status' => 'menunggu',
    //                     'gross_amount' => $totalHarga,
    //                     'payment_type' => 'ewallet',
    //                     'redirect_url' => $snapTransaction->redirect_url,
    //                 ]
    //             ]);
    //         }

    //         // Jika metode tunai, langsung selesai
    //         return response()->json([
    //             'success' => true,
    //             'message' => 'Transaksi tunai berhasil dibuat.',
    //             'data' => [
    //                 'order_id' => $orderId,
    //                 'status' => 'dibayar',
    //                 'gross_amount' => $totalHarga,
    //                 'payment_type' => 'tunai'
    //             ]
    //         ]);
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'success' => false,
    //             'message' => 'Terjadi kesalahan: ' . $e->getMessage()
    //         ], 500);
    //     }
    // }

    public function createTransaction(Request $request)
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

            // Respon dasar
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

            // Jika metode ewallet, proses ke Midtrans
            if ($request->metode_pembayaran === 'ewallet') {
                Config::$serverKey = config('midtrans.server_key');
                Config::$clientKey = config('midtrans.clientKey');
                Config::$isProduction = config('midtrans.is_production');
                Config::$isSanitized = true;
                Config::$is3ds = true;

                $item_details = array_map(function ($item) {
                    return [
                        'id' => $item['id_tiket'],
                        'price' => $item['harga_satuan'],
                        'quantity' => $item['jumlah'],
                        'name' => $item['nama_tiket'],
                    ];
                }, $detailTransaksi);

                $transaction_data = [
                    'payment_type' => 'qris',
                    'transaction_details' => [
                        'order_id' => $orderId,
                        'gross_amount' => (int) $totalHarga,
                    ],
                    'item_details' => array_map(function ($item) {
                        return [
                            'id' => (string) $item['id_tiket'],
                            'price' => (int) $item['harga_satuan'],
                            'quantity' => (int) $item['jumlah'],
                            'name' => substr($item['nama_tiket'], 0, 50),
                        ];
                    }, $detailTransaksi),
                    'customer_details' => [
                        'first_name' => $user->name,
                        'email' => $user->email,
                    ],
                    'callbacks' => [
                        'finish' => url('/payment/finish'),
                    ],  
                ];

                $snapTransaction = Snap::createTransaction($transaction_data);

                // Simpan redirect_url ke database
                $transaksi->redirect_url = $snapTransaction->redirect_url;
                $transaksi->save(); // penting: simpan perubahan

                $responseData['redirect_url'] = $snapTransaction->redirect_url;

                return response()->json([
                    'success' => true,
                    'message' => 'Transaksi berhasil dibuat, silakan lanjutkan pembayaran.',
                    'data' => $responseData,
                ]);
            }

            // Jika metode tunai
            return response()->json([
                'success' => true,
                'message' => 'Transaksi tunai berhasil dibuat.',
                'data' => $responseData,
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
}
