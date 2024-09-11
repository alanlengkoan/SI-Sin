<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeri extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'galeri';
    // untuk default primary key
    protected $primaryKey = 'id_galeri';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'id_galeri',
        'jenis',
        'file',
        'url',
        'status',
        'by_users',
    ];

    // get status active
    public function scopeActive($query)
    {
        return $query->whereStatus('1');
    }
}
