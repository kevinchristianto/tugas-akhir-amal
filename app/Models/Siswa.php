<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'nis',
        'nama_lengkap',
        'jenis_kelamin',
        'tempat_lahir',
        'tanggal_lahir',
        'no_hp',
        'email',
        'alamat',
        'tahun_ajaran'
    ];

    public function waliMurid(): HasOne
    {
        return $this->hasOne(WaliMurid::class);
    }
}
