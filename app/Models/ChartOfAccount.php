<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChartOfAccount extends Model
{
    protected $fillable = [
        'kode_akun',
        'nama_akun',
        'saldo_normal',
        'kategori',
        'deskripsi',
        'parent_id',
        'level',
    ];
}
