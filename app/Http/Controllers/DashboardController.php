<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TransaksiTiket;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class DashboardController extends Controller
{
    public function getStatistics(Request $request)
    {
        try {
            $jenisFilter = $request->query('jenis'); // Filter: kolam atau parkir
            
            // Validate jenis parameter
            if (!in_array($jenisFilter, ['kolam', 'parkir'])) {
                return response()->json([
                    'success' => false,
                    'message' => 'Parameter jenis harus berupa kolam atau parkir'
                ], 400);
            }
            
            // Get today's date and first day of month for filters
            $today = Carbon::today();
            $firstDayOfMonth = Carbon::today()->startOfMonth();
            
            // 1. Get 5 latest transactions by type
            $recentTransactions = TransaksiTiket::with(['user', 'detailTransaksiTiket.tiket'])
                ->whereHas('detailTransaksiTiket.tiket', function ($query) use ($jenisFilter) {
                    $query->where('jenis', $jenisFilter);
                })
                ->latest()
                ->take(5)
                ->get()
                ->map(function ($transaction) use ($jenisFilter) {
                    // Convert to array to get all fields
                    $data = $transaction->toArray();
                    
                    // Add jenis_transaksi field based on filter
                    $data['jenis_transaksi'] = $jenisFilter;
                    
                    // Remove relationship data we don't need
                    unset($data['user']);
                    unset($data['detail_transaksi_tiket']);
                    
                    return $data;
                });
        
            // 2. Count reserved today (status selesai or divalidasi)
            $reservedToday = TransaksiTiket::whereIn('status', ['selesai', 'divalidasi'])
                ->whereDate('created_at', $today)
                ->whereHas('detailTransaksiTiket.tiket', function ($query) use ($jenisFilter) {
                    $query->where('jenis', $jenisFilter);
                })
                ->count();
                
            // 3. Count reserved this month
            $reservedThisMonth = TransaksiTiket::whereIn('status', ['selesai', 'divalidasi'])
                ->whereDate('created_at', '>=', $firstDayOfMonth)
                ->whereHas('detailTransaksiTiket.tiket', function ($query) use ($jenisFilter) {
                    $query->where('jenis', $jenisFilter);
                })
                ->count();
                
            // 4. Calculate total tickets sold for the specified type
            $ticketsSold = DB::table('detail_transaksi_tiket')
                ->join('tiket', 'detail_transaksi_tiket.id_tiket', '=', 'tiket.id_tiket')
                ->join('transaksi_tiket', 'detail_transaksi_tiket.id_transaksi_tiket', '=', 'transaksi_tiket.id_transaksi_tiket')
                ->where('tiket.jenis', $jenisFilter)
                ->whereIn('transaksi_tiket.status', ['selesai', 'divalidasi'])
                ->sum('detail_transaksi_tiket.jumlah');
                
            return response()->json([
                'success' => true,
                'message' => 'Data dashboard berhasil diambil',
                'data' => [
                    'jenis_tiket' => $jenisFilter,
                    'reserved_today' => $reservedToday,
                    'reserved_this_month' => $reservedThisMonth,
                    'tickets_sold' => $ticketsSold,
                    // 'recent_transactions' => $recentTransactions
                    'data' => $recentTransactions
                ]
            ]);
            
        } catch (\Exception $e) {
            Log::error('Error fetching dashboard statistics', [
                'error_message' => $e->getMessage(),
                'trace' => $e->getTraceAsString()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Gagal mengambil data dashboard: ' . $e->getMessage()
            ], 500);
        }
    }
}