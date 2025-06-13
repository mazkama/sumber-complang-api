<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProfilController extends Controller
{
    public function update(Request $request)
    {
        try { 

            // Define custom validation messages
            $messages = [
                'username.unique' => 'Username telah digunakan oleh pengguna lain.',
                'no_hp.unique' => 'Nomor HP telah digunakan oleh pengguna lain.',
                'no_hp.regex' => 'Format Nomor HP tidak valid. Gunakan format yang benar.',
            ];

            // Validate the request data with custom messages
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'username' => 'required|max:255|unique:users,username,' . auth()->id() . ',id_user', // Fixed unique rule syntax
                'no_hp' => 'required|string|max:15|regex:/^[0-9]{10,15}$/'.'|unique:users,no_hp,' . auth()->id() . ',id_user',
            ], $messages);

            // Get authenticated user with error checking
            $user = auth()->user();

            if (!$user) {
                Log::error('No authenticated user found during profile update');
                return response()->json(
                    [
                        'status' => false,
                        'code' => 401,
                        'message' => 'User tidak terautentikasi',
                    ],
                    200,
                );
            } 

            // Update the user's profile
            $updated = $user->update($request->only('name', 'username', 'no_hp'));

            if (!$updated) {
                throw new \Exception('Failed to update user record');
            }

            // Refresh user data to confirm changes
            $user->refresh(); 

            return response()->json([
                'status' => true,
                'code' => 200,
                'message' => 'Profile Berhasil diperbarui',
                'data' => [
                    'name' => $user->name,
                    'username' => $user->username,
                    'no_hp' => $user->no_hp,
                ],
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error during profile update', [
                'errors' => $e->errors(),
            ]);

            return response()->json(
                [
                    'status' => false,
                    'code' => 422,
                    'message' => 'Validasi gagal',
                    'errors' => $e->errors(),
                ],
                200,
            );
        } catch (\Exception $e) {
            Log::error('Exception during profile update', [
                'message' => $e->getMessage(),
                'trace' => $e->getTraceAsString(),
            ]);

            return response()->json(
                [
                    'status' => false,
                    'code' => 500,
                    'message' => 'Profile gagal diperbarui',
                    'error' => $e->getMessage(),
                ],
                200,
            );
        }
    }
}
