<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Organisasi extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'organisasi';
    // untuk default primary key
    protected $primaryKey = 'id_organisasi';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'id_organisasi',
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
