<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Barang extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'barang';
    protected $fillable = [
        'nama_barang',
        'harga_barang',
        'stok_barang',
        'deskripsi_barang',
        'foto_barang',
        'deleted_at'
    ];
}
