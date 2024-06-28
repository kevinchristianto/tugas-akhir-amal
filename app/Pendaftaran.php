<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Pendaftaran extends Model
{
    protected $table = 'pendaftaran';

    protected $fillable = [
        'siswa_id',
        'trx_id',
    ];

    public function detail_siswa(): BelongsTo {
        return $this->belongsTo(Siswa::class, 'siswa_id');
    }

    public function detail_transaksi(): BelongsTo {
        return $this->belongsTo(Transaksi::class, 'trx_id');
    }
}
