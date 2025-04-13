<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaliMurid extends Model
{
    protected $table = 'wali_murid';

    protected $fillable = [
        'no_hp',
        'nama_orang_tua',
        'siswa_id',
        'email',
    ];
}
