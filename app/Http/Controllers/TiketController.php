<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tiket;
use App\Models\TransaksiTiket;
use Illuminate\Support\Facades\Validator;

class TiketController extends Controller
{
    // INDEX Tiket
    public function index(Request $request)
    {
        $jenis = $request->query('jenis');

        // Filter jenis jika valid
        if ($jenis && in_array($jenis, ['parkir', 'kolam'])) {
            $tiket = Tiket::where('jenis', $jenis)->get();
            $message = "Daftar tiket dengan jenis '{$jenis}' berhasil diambil";
        } else {
            $tiket = Tiket::all();
            $message = "Daftar semua tiket berhasil diambil";
        }

        return response()->json([
            'success' => true,
            'message' => $message,
            'data' => $tiket
        ], 200);
    }

    // INSERT Tiket
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_tiket' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'kategori' => 'nullable|string|max:255',
            'jenis' => 'required|in:parkir,kolam',
            'deskripsi' => 'nullable|string',
        ]);

        try {
            $tiket = Tiket::create($validated);

            return response()->json([
                'status' => true,
                'message' => 'Tiket berhasil ditambahkan',
                'data' => $tiket
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal menambahkan tiket',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // EDIT Tiket
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_tiket' => 'required|string|max:255',
            'harga' => 'required|numeric|min:0',
            'kategori' => 'nullable|string|max:255',
            'jenis' => 'required|in:parkir,kolam',
            'deskripsi' => 'nullable|string',
        ]);

        try {
            $tiket = Tiket::findOrFail($id);
            $tiket->update($validated);

            return response()->json([
                'status' => true,
                'message' => 'Tiket berhasil diperbarui',
                'data' => $tiket
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Gagal memperbarui tiket',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    // USED Tiket
    public function usedTiket($idOrder)
    {
        try {
            // Ambil transaksi beserta relasi user dan detail tiket
            $tiket = TransaksiTiket::with(['user', 'detailTransaksiTiket.tiket'])
                ->where('order_id', $idOrder)
                ->firstOrFail();

            // Cek apakah tiket sudah divalidasi
            if ($tiket->id_divalidasi_oleh !== null) {
                return response()->json([
                    'success' => false,
                    'message' => 'Tiket sudah divalidasi sebelumnya.',
                ], 400);
            }

            // Update status validasi
            $tiket->update([
                'status' => 'divalidasi',
                'waktu_validasi' => now(),
                'id_divalidasi_oleh' => auth()->id(),
            ]);

            // Siapkan detail transaksi
            $detail = $tiket->detailTransaksiTiket->map(function ($item) {
                return [
                    'id_tiket' => $item->id_tiket,
                    'nama_tiket' => $item->tiket->nama_tiket,
                    'harga' => $item->tiket->harga,
                    'jumlah' => $item->jumlah,
                    'subtotal' => $item->subtotal,
                ];
            });

            // Respon lengkap
            return response()->json([
                'success' => true,
                'message' => 'Tiket berhasil divalidasi dan digunakan.',
                'data' => [
                    'order_id' => $tiket->order_id,
                    'status' => $tiket->status,
                    'tanggal' => $tiket->created_at->format('Y-m-d H:i:s'),
                    'gross_amount' => $tiket->total_harga,
                    'payment_type' => $tiket->metode_pembayaran,
                    'customer' => [
                        'name' => $tiket->user->name,
                        'email' => $tiket->user->email,
                    ],
                    'detail_transaksi' => $detail,
                    'redirect_url' => $tiket->redirect_url,
                ],
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Gagal memproses tiket.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
