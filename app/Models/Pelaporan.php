<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pelaporan extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'pelaporan';
    // untuk default primary key
    protected $primaryKey = 'id_pelaporan';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'id_marketing',
        'tgl',
        'jenis',
    ];

    // relasi tabel
    protected $with = ['toMarketing'];

    // relasi ke tabel marketing
    public function toMarketing()
    {
        return $this->belongsTo(Marketing::class, 'id_marketing', 'id_marketing');
    }

    // relasi ke tabel agen
    public function toAgen()
    {
        return $this->belongsTo(Agen::class, 'id_pelaporan', 'id_pelaporan');
    }

    // relasi ke tabel petambak
    public function toPetambak()
    {
        return $this->belongsTo(Petambak::class, 'id_pelaporan', 'id_pelaporan');
    }
}
