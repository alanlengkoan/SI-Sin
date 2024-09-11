<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medsos extends Model
{
    use HasFactory;
    // untuk default tabel
    protected $table = 'medsos';
    // untuk default id
    protected $primaryKey = 'id_medsos';
    // untuk fillable
    protected $fillable = [
        'id_medsos',
        'nama',
        'icon',
        'url',
        'username',
        'by_users',
    ];
}
