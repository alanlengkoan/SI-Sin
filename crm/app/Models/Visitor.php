<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitor extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'visitors';
    // untuk default primary key
    protected $primaryKey = 'id_visitor';
    // untuk tabel yang bisa di isi
    protected $fillable = [
        'ip',
        'city',
        'region',
        'country',
        'loc',
        'org',
        'timezone',
    ];
}
