<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Karyawan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'karyawan';
    protected $fillable = [
        'user_id',
        'nama_karyawan',
        'username',
        'password',
        'konfirmasi_password',
        'no_hp',
        'alamat',
        'tanggal_lahir',
        'status',
        'deleted_at'
    ];
}
