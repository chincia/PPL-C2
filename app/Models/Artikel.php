<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artikel extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'artikel';
    protected $fillable = [
        'barang_id',
        'deskripsi',
        'deleted_at'
    ];
}
