<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matpel extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'matpel';
    // untuk default primary key
    protected $primaryKey = 'id_matpel';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'id_matpel',
        'nama',
        'by_users',
    ];
}
