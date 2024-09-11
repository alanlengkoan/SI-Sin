<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agen extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'agen';
    // untuk default primary key
    protected $primaryKey = 'id_agen';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'id_pelaporan',
        'nama',
        'alamat',
        'no_hp',
        'metode_pembayaran',
        'keluhan',
        'keterangan',
        'foto_satu',
        'foto_dua',
        'foto_tiga',
        'foto_empat',
        'foto_lima',
        'target',
        'market',
        'jumlah_ton',
        'brand_kompetitor',
        'harga_kompetitor',
    ];
}
