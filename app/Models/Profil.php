<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'profil';
    // untuk default primary key
    protected $primaryKey = 'id_profil';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'id_profil',
        'nama',
        'slug',
        'gambar',
        'deskripsi',
        'by_users',
    ];
}
