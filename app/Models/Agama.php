<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'agama';
    // untuk default primary key
    protected $primaryKey = 'id_agama';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'id_agama',
        'nama',
        'by_users',
    ];
}
