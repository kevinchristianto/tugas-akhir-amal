<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class SPP extends Model
{
    protected $table = 'spp';

    protected $fillable = [
        'siswa_id',
        'periode',
        'tanggal_bayar',
        'trx_id',
    ];

    public function detail_siswa(): BelongsTo {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function detail_transaksi(): BelongsTo {
        return $this->belongsTo(Transaksi::class, 'trx_id');
    }
}
