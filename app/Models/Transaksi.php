<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Scope;
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

    // The scoped query can use this decorator, or use named function
    // like scopeThisMonth then just call thisMonth() on the controller
    #[Scope]
    public function thisMonth($query)
    {
        return $query->whereMonth('tanggal', now()->month)
                    ->whereYear('tanggal', now()->year);
    }
}
