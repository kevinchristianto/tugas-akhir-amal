<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WaliMurid extends Model
{
    protected $table = 'wali_murid';

    protected $fillable = [
        'no_hp',
        'nama_ayah',
        'nama_ibu',
        'siswa_id',
        'email',
    ];
}
