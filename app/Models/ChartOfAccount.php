<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

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
    public function detail_transaksi(): HasMany
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}
