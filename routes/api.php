<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route; 
use App\Http\Controllers\TransaksiTiketController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\KolamController;
use App\Http\Controllers\TiketController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/transaksi-tiket', [TransaksiTiketController::class, 'createTransaction'])->middleware('auth:sanctum');
Route::get('/transaksi/detail/{orderId}', [TransaksiTiketController::class, 'showTransactionDetail']);

Route::post('/midtrans-notification', [TransaksiTiketController::class, 'notification']);
Route::post('/xendit-notification', [TransaksiTiketController::class, 'xenditNotification']);
Route::get('/final-transaksi/{order_id}', [TransaksiTiketController::class, 'finalTransaction']);

Route::apiResource('kolam', KolamController::class);

Route::get('/tiket', [TiketController::class, 'index']);
Route::post('/tiket', [TiketController::class, 'store']);
Route::put('/tiket/{id}', [TiketController::class, 'update']);
Route::get('/tiket/used/{idOrder}', [TiketController::class, 'usedTiket'])->middleware('auth:sanctum');

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);