<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'jabatan';
    // untuk default primary key
    protected $primaryKey = 'id_jabatan';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'id_jabatan',
        'nama',
        'by_users',
    ];
}
