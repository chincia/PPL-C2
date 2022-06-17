<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'admin';
    protected $fillable = [
        'user_id',
        'nama',
        'email',
        'no_hp',
        'tanggal_lahir',
        'username',
        'password',
        'konfirmasi_password',
        'deleted_at'
    ];
}
