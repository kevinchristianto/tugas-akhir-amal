<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    protected $table = 'transaksi';

    protected $fillable = [
        'jenis_id',
        'nominal',
        'deskripsi',
        'tanggal_transaksi',
        'reference_table',
        'reference_id',
    ];

    public function jenis(): BelongsTo
    {
        return $this->belongsTo(JenisTransaksi::class, 'jenis_id');
    }
}
