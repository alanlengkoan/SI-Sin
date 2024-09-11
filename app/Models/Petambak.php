<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Petambak extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'petambak';
    // untuk default primary key
    protected $primaryKey = 'id_petambak';
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
        'komoditi',
        'jumlah_kolam',
        'luas',
        'jumlah_ton',
        'pakan',
        'harga_pakan',
        'jumlah_terpakai',
    ];
}
