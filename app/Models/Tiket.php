<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tiket extends Model
{
    use HasFactory;

    protected $table = 'tiket';

    protected $primaryKey = 'id_tiket';

    protected $fillable = ['id_tiket', 'nama_tiket', 'harga', 'kategori', 'jenis', 'deskripsi'];
}
