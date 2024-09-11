<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'siswa';
    // untuk default primary key
    protected $primaryKey = 'id_siswa';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'id_siswa',
        'id_agama',
        'nis',
        'nama',
        'kelamin',
        'tgl_lahir',
        'tmp_lahir',
        'alamat',
        'thn_masuk',
        'thn_lulus',
        'foto',
        'status',
        'by_users',
    ];

    // untuk relasi
    protected  $with = ['toAgama'];

    // untuk relasi ke tabel agama
    public function toAgama()
    {
        return $this->belongsTo(Agama::class, 'id_agama', 'id_agama');
    }
}
