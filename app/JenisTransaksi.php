<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class JenisTransaksi extends Model
{
    protected $table = 'jenis_transaksi';

    protected $fillable = [
        'kode_transaksi',
        'nama_transaksi',
        'jenis_transaksi'
    ];
}
