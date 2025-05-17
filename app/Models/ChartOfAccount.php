<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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

    public function saldoOptimized(): Attribute
    {
        return Attribute::make(
            get: function () {
                $debit = $this->total_debit ?? 0;
                $kredit = $this->total_kredit ?? 0;

                return $this->saldo_normal == 'debit'
                    ? $debit - $kredit
                    : $kredit - $debit;
            }
        );
    }

    public function getSaldoAkhirAttribute()
    {
        $debit = $this->detail_transaksi->sum('debit');
        $kredit = $this->detail_transaksi->sum('kredit');

        return match($this->saldo_normal) {
            'debit' => $debit - $kredit,
            'kredit' => $kredit - $debit,
            default => 0,
        };
    }

}
