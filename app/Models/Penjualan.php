<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Penjualan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'penjualan';
    protected $fillable = [
        'barang_id',
        'karyawan_id',
        'pelanggan_id',
        'jumlah_barang',
        'harga_barang',
        'total_penjualan',
        'deleted_at'
    ];
}
