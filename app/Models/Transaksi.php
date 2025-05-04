<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = [
        'nomor_transaksi',
        'tanggal',
        'deskripsi',
        'tipe_transaksi',
        // 'total',
    ];

    public function detail(): HasMany
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}
