<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use Illuminate\Support\Facades\Validator;

use App\Models\User;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|unique:users',
            'name' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15|unique:users',
            'password' => 'required|string|min:6',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code' => 422,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 200);
        }

        try {
            $user = User::create([
                'username' => $request->username,
                'name' => $request->name, 
                'no_hp' => $request->no_hp, 
                'role' => "pengunjung",
                'password' => bcrypt($request->password),
            ]);

            return response()->json([
                'code' => 201,
                'message' => 'Registrasi berhasil',
                'user' => [
                    'id_user' => $user->id_user,
                    'name' => $user->name,
                    'no_hp' => $user->no_hp, 
                    'username' => $user->username,
                    'role' => "pengunjung",
                ]
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'message' => 'Terjadi kesalahan saat registrasi',
                'error' => $e->getMessage()
            ], 200);
        }
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $request->username)->first();

        if (!$user) {
            return response()->json([
                'code' => 401,
                'success' => false,
                'message' => 'Username atau password salah.',
            ], 200);
        }

        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'code' => 401,
                'success' => false,
                'message' => 'Username atau password salah.',
            ], 200);
        }

        $token = $user->createToken('token')->plainTextToken;

        return response()->json([
            'code' => 200,
            'success' => true,
            'message' => 'Login berhasil',
            'token' => $token,
            'user' => [
                'id_user' => $user->id_user,
                'username' => $user->username,
                'name' => $user->name,
                'no_hp' => $user->no_hp, 
                'role' => $user->role,
            ]
        ]);
    }

    public function changePassword(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password' => 'required|string',
            'new_password' => 'required|string|min:6',
            'confirm_password' => 'required|string|same:new_password',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'code' => 422,
                'message' => 'Validasi gagal',
                'errors' => $validator->errors()
            ], 200);
        }

        try {
            // Mendapatkan user yang sedang login
            $user = $request->user();

            // Memverifikasi password lama
            if (!Hash::check($request->current_password, $user->password)) {
                return response()->json([
                    'code' => 401,
                    'message' => 'Password lama tidak sesuai'
                ], 200);
            }

            // Memastikan password baru tidak sama dengan password lama
            if (Hash::check($request->new_password, $user->password)) {
                return response()->json([
                    'code' => 422,
                    'message' => 'Password baru tidak boleh sama dengan password lama'
                ], 200);
            }

            // Update password
            $user->password = bcrypt($request->new_password);
            $user->save();

            return response()->json([
                'code' => 200,
                'message' => 'Password berhasil diubah'
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'message' => 'Terjadi kesalahan saat mengubah password',
                'error' => $e->getMessage()
            ], 200);
        }
    }
}
