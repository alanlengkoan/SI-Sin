<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'kategori';
    // untuk default primary key
    protected $primaryKey = 'id_kategori';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'id_kategori',
        'nama',
        'slug',
        'by_users',
    ];

    // untuk relasi ke tabel informasi
    public function toInformasi()
    {
        return $this->hasMany(Informasi::class, 'id_kategori', 'id_kategori');
    }
}
