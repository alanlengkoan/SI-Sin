<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'prestasi';
    // untuk default primary key
    protected $primaryKey = 'id_prestasi';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'id_prestasi',
        'nama',
        'gambar',
        'deskripsi',
        'status',
        'by_users',
    ];

    // get status active
    public function scopeActive($query)
    {
        return $query->whereStatus('1');
    }
}
