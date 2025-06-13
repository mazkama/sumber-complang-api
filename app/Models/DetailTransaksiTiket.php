<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DetailTransaksiTiket extends Model
{
    use HasFactory;

    protected $table = 'detail_transaksi_tiket';

    protected $primaryKey = 'id_detail_transaksi_tiket';

    protected $fillable = [
        'id_transaksi_tiket', 
        'id_tiket',
        'no_kendaraan',
        'waktu_validasi',
        'jumlah', 
        'subtotal'
    ];

    // Relasi ke Tiket
    public function tiket()
    {
        return $this->belongsTo(Tiket::class, 'id_tiket');
    }

    // Relasi ke TransaksiTiket
    public function transaksiTiket()
    {
        return $this->belongsTo(TransaksiTiket::class, 'id_transaksi_tiket');
    }
}
