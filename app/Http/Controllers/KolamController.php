<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Kolam;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log; 


class KolamController extends Controller
{
    // GET /api/kolam
    public function index()
    {
        $data = Kolam::all();
        return response()->json([
            'success' => true,
            'message' => 'Data kolam berhasil diambil.',
            'data' => $data,
        ], 200);
    }

    // POST /api/kolam
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kedalaman' => 'nullable|numeric',
            'luas' => 'nullable|numeric',
            'url_foto' => 'nullable|image|mimes:jpeg,png,jpg',
            // 'url_foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $request->all();

        if ($request->hasFile('url_foto')) {
            $image = $request->file('url_foto');
            $path = $image->store('kolam', 'public');
            $data['url_foto'] = asset('storage/' . $path);
        }

        $kolam = Kolam::create($data);

        return response()->json([
            'success' => true,
            'message' => 'Data kolam berhasil ditambahkan.',
            'data' => $kolam,
        ], 201);
    }

    // GET /api/kolam/{id}
    public function show($id)
    {
        $kolam = Kolam::find($id);

        if (!$kolam) {
            return response()->json([
                'success' => false,
                'message' => 'Data kolam tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Detail kolam berhasil diambil.',
            'data' => $kolam,
        ], 200);
    }

    // PUT /api/kolam/{id}
    public function update(Request $request, $id)
    {
        $kolam = Kolam::find($id);

        if (!$kolam) {
            return response()->json([
                'success' => false,
                'message' => 'Data kolam tidak ditemukan.',
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'nama' => 'sometimes|required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kedalaman' => 'nullable|numeric',
            'luas' => 'nullable|numeric',
            'url_foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validasi gagal.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $data = $request->all();

        if ($request->hasFile('url_foto')) {
            // Hapus gambar lama jika ada
            if ($kolam->url_foto && file_exists(public_path('storage/' . basename($kolam->url_foto)))) {
                unlink(public_path('storage/' . basename($kolam->url_foto)));
            }

            $image = $request->file('url_foto');
            $path = $image->store('kolam', 'public');
            $data['url_foto'] = asset('storage/' . $path);
        }

        $kolam->update($data);

        return response()->json([
            'success' => true,
            'message' => 'Data kolam berhasil diperbarui.',
            'data' => $kolam,
        ], 200);
    }

    // DELETE /api/kolam/{id}
    public function destroy($id)
    {
        $kolam = Kolam::find($id);

        if (!$kolam) {
            return response()->json([
                'success' => false,
                'message' => 'Data kolam tidak ditemukan.',
            ], 404);
        } 

        // Hapus gambar dari storage jika ada
        if (!empty($kolam->url_foto)) {
            // Ambil path relatif dari url_foto
            $relativePath = str_replace(asset('storage') . '/', '', $kolam->url_foto);

            // Pastikan path tidak kosong dan file benar-benar ada di storage
            if (!empty($relativePath) && Storage::disk('public')->exists($relativePath)) {
                Storage::disk('public')->delete($relativePath);
            }
        }

        $kolam->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data kolam berhasil dihapus.',
        ], 200);
    }
}
