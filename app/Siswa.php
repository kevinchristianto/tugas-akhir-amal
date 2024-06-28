<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'siswa';

    protected $fillable = [
        'nis',
        'nama',
        'nama_wali',
        'tanggal_lahir',
        'jenis_kelamin',
        'alamat',
    ];
}
