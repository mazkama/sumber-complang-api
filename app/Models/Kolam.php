<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kolam extends Model
{
    use HasFactory;

    // Nama tabel jika tidak mengikuti konvensi Laravel
    protected $table = 'kolam';

    // Primary key kustom
    protected $primaryKey = 'id_kolam'; 

    // Kolom-kolom yang bisa diisi
    protected $fillable = [
        'nama',
        'deskripsi',
        'url_foto',
        'kedalaman',
        'luas',
    ];
}
