<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marketing extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'marketing';
    // untuk default primary key
    protected $primaryKey = 'id_marketing';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'nama',
    ];
}
