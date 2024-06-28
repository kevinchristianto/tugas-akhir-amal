<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Penggajian extends Model
{
    protected $table = 'penggajian';

    protected $fillable = [
        'guru_id',
        'periode',
        'tanggal_bayar',
        'trx_id',
    ];

    public function detail_guru(): BelongsTo {
        return $this->belongsTo(Guru::class, 'guru_id');
    }

    public function detail_transaksi(): BelongsTo {
        return $this->belongsTo(Transaksi::class, 'trx_id');
    }
}
