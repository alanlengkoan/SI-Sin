<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengaturan extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'pengaturan';
    // untuk default primary key
    protected $primaryKey = 'id_pengaturan';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'key',
        'value',
    ];
}
