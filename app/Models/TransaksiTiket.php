<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TransaksiTiket extends Model
{
    use HasFactory;

    protected $table = 'transaksi_tiket';

    protected $primaryKey = 'id_transaksi_tiket';

    protected $fillable = [
        'order_id',
        'id_user', 
        'total_harga', 
        'metode_pembayaran',
        'id_divalidasi_oleh',
        'waktu_validasi', 
        'status',
        'redirect_url'
    ];

    // Relasi ke DetailTransaksiTiket
    public function detailTransaksiTiket()
    {
        return $this->hasMany(DetailTransaksiTiket::class, 'id_transaksi_tiket');
    }

    // Relasi ke User (penjual/pembeli)
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    // Relasi ke User (validator)
    public function divalidasiOleh()
    {
        return $this->belongsTo(User::class, 'id_divalidasi_oleh');
    }

}
