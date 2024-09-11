<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fasilitas extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'fasilitas';
    // untuk default primary key
    protected $primaryKey = 'id_fasilitas';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'id_fasilitas',
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
