<?php

namespace Database\Seeders;

use App\Models\Siswa;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nis' => '123456789',
                'nama_lengkap' => 'Kevin',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1995-01-01',
                'no_hp' => '123456789',
                'email' => 'kevin@gmail.com',
                'alamat' => 'Jl. Kevin',
                'tahun_ajaran' => '2024/2025'
            ],
            [
                'nis' => '123456780',
                'nama_lengkap' => 'John',
                'jenis_kelamin' => 'L',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '1995-01-01',
                'no_hp' => '123456780',
                'email' => 'john@gmail.com',
                'alamat' => 'Jl. John',
                'tahun_ajaran' => '2024/2025'
            ],
        ];
        
        Siswa::upsert($data, []);
    }
}
