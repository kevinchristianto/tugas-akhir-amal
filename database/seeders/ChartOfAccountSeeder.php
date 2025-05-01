<?php

namespace Database\Seeders;

use App\Models\ChartOfAccount;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ChartOfAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            // ===== ASET =====
            [
                'kode_akun' => '1.100',
                'nama_akun' => 'Kas',
                'saldo_normal' => 'debit',
                'kategori' => 'aset',
                'parent_id' => null,
                'level' => 1,
                'deskripsi' => 'Uang tunai di sekolah',
            ],
            [
                'kode_akun' => '1.110',
                'nama_akun' => 'Bank',
                'saldo_normal' => 'debit',
                'kategori' => 'aset',
                'parent_id' => null,
                'level' => 1,
                'deskripsi' => 'Uang di rekening bank',
            ],
            [
                'kode_akun' => '1.120',
                'nama_akun' => 'Piutang SPP',
                'saldo_normal' => 'debit',
                'kategori' => 'aset',
                'parent_id' => null,
                'level' => 1,
                'deskripsi' => 'Tagihan SPP yang belum dibayar',
            ],
            [
                'kode_akun' => '1.130',
                'nama_akun' => 'Inventaris Sekolah',
                'saldo_normal' => 'debit',
                'kategori' => 'aset',
                'parent_id' => null,
                'level' => 1,
                'deskripsi' => 'Aset tetap seperti meja, komputer',
            ],

            // ===== LIABILITAS =====
            [
                'kode_akun' => '2.100',
                'nama_akun' => 'Utang Usaha',
                'saldo_normal' => 'kredit',
                'kategori' => 'liabilitas',
                'parent_id' => null,
                'level' => 1,
                'deskripsi' => 'Utang pembelian perlengkapan',
            ],
            [
                'kode_akun' => '2.110',
                'nama_akun' => 'Utang Gaji',
                'saldo_normal' => 'kredit',
                'kategori' => 'liabilitas',
                'parent_id' => null,
                'level' => 1,
                'deskripsi' => 'Gaji guru/staf yang belum dibayar',
            ],

            // ===== MODAL =====
            [
                'kode_akun' => '3.100',
                'nama_akun' => 'Modal Yayasan',
                'saldo_normal' => 'kredit',
                'kategori' => 'ekuitas',
                'parent_id' => null,
                'level' => 1,
                'deskripsi' => 'Dana dari yayasan sekolah',
            ],
            [
                'kode_akun' => '3.110',
                'nama_akun' => 'Saldo Laba Ditahan',
                'saldo_normal' => 'kredit',
                'kategori' => 'ekuitas',
                'parent_id' => null,
                'level' => 1,
                'deskripsi' => 'Akumulasi laba tahun.tahun sebelumnya',
            ],

            // ===== PENDAPATAN =====
            [
                'kode_akun' => '4.100',
                'nama_akun' => 'Pendapatan SPP',
                'saldo_normal' => 'kredit',
                'kategori' => 'pendapatan',
                'parent_id' => null,
                'level' => 1,
                'deskripsi' => 'Pemasukan dari iuran SPP siswa',
            ],
            [
                'kode_akun' => '4.110',
                'nama_akun' => 'Pendapatan Pendaftaran',
                'saldo_normal' => 'kredit',
                'kategori' => 'pendapatan',
                'parent_id' => null,
                'level' => 1,
                'deskripsi' => 'Pemasukan dari uang pangkal siswa baru',
            ],
            [
                'kode_akun' => '4.120',
                'nama_akun' => 'Pendapatan Donasi',
                'saldo_normal' => 'kredit',
                'kategori' => 'pendapatan',
                'parent_id' => null,
                'level' => 1,
                'deskripsi' => 'Sumbangan dari wali murid atau pihak luar',
            ],

            // ===== BEBAN =====
            [
                'kode_akun' => '5.100',
                'nama_akun' => 'Beban Gaji Guru',
                'saldo_normal' => 'debit',
                'kategori' => 'beban',
                'parent_id' => null,
                'level' => 1,
                'deskripsi' => 'Pengeluaran untuk gaji guru',
            ],
            [
                'kode_akun' => '5.110',
                'nama_akun' => 'Beban Listrik & Air',
                'saldo_normal' => 'debit',
                'kategori' => 'beban',
                'parent_id' => null,
                'level' => 1,
                'deskripsi' => 'Pengeluaran rutin PLN & PDAM',
            ],
            [
                'kode_akun' => '5.120',
                'nama_akun' => 'Beban ATK',
                'saldo_normal' => 'debit',
                'kategori' => 'beban',
                'parent_id' => null,
                'level' => 1,
                'deskripsi' => 'Pengeluaran alat tulis kantor',
            ],
        ];

        ChartOfAccount::upsert($data, []);
    }
}
