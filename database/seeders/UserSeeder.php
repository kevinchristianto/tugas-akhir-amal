<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'name' => 'Admin',
                'username' => 'admin',
                'password' => bcrypt('admin'),
                'level' => 'admin',
            ],
            [
                'name' => 'Staff Keuangan',
                'username' => 'keuangan',
                'password' => bcrypt('keuangan'),
                'level' => 'keuangan',
            ],
            [
                'name' => 'Staff Tata Usaha',
                'username' => 'tu',
                'password' => bcrypt('tu'),
                'level' => 'tu',
            ],
        ];
        User::upsert($data, []);
    }
}
