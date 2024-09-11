<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Informasi extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'informasi';
    // untuk default primary key
    protected $primaryKey = 'id_informasi';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'id_informasi',
        'id_kategori',
        'judul',
        'isi',
        'gambar',
        'status',
        'dilihat',
        'by_users',
    ];

    // untuk relasi
    protected  $with = ['toKategori'];

    // untuk relasi ke tabel kategori
    public function toKategori()
    {
        return $this->belongsTo(Kategori::class, 'id_kategori', 'id_kategori');
    }

    // get status active
    public function scopeActive($query)
    {
        return $query->whereStatus('1');
    }
}
