<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'guru';
    // untuk default primary key
    protected $primaryKey = 'id_guru';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'id_guru',
        'id_agama',
        'id_matpel',
        'id_jabatan',
        'id_pendidikan',
        'nip',
        'nama',
        'kelamin',
        'tgl_lahir',
        'tmp_lahir',
        'alamat',
        'foto',
        'facebook',
        'instagram',
        'by_users',
    ];

    // untuk relasi
    protected  $with = ['toAgama', 'toMatpel', 'toJabatan', 'toPendidikan'];

    // untuk relasi ke tabel agama
    public function toAgama()
    {
        return $this->belongsTo(Agama::class, 'id_agama', 'id_agama');
    }

    // untuk relasi ke tabel matpel
    public function toMatpel()
    {
        return $this->belongsTo(Matpel::class, 'id_matpel', 'id_matpel');
    }

    // untuk relasi ke tabel jabatan
    public function toJabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan', 'id_jabatan');
    }

    // untuk relasi ke tabel pendidikan
    public function toPendidikan()
    {
        return $this->belongsTo(Pendidikan::class, 'id_pendidikan', 'id_pendidikan');
    }
}
