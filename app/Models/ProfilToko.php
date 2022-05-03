<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProfilToko extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'profil_toko';
    protected $fillable = [
        'nama_pemilik',
        'no_hp',
        'tahun_berdiri',
        'deskripsi',
        'deleted_at'
    ];
}
