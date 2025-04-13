<?php

namespace Database\Seeders;

use App\Models\Guru;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GuruSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'nip' => '123456789',
                'nama_lengkap' => 'Kevin',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. Kevin',
                'no_hp' => '123456789',
            ],
            [
                'nip' => '123456780',
                'nama_lengkap' => 'John',
                'jenis_kelamin' => 'L',
                'alamat' => 'Jl. John',
                'no_hp' => '123456780',
            ]
        ];

        Guru::upsert($data, []);
    }
}
