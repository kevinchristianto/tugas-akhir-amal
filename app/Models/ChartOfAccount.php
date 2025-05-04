<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class ChartOfAccount extends Model
{
    public function detail_transaksi(): HasMany
    {
        return $this->hasMany(DetailTransaksi::class);
    }
}
