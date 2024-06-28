<?php

use App\JenisTransaksi;
use Illuminate\Database\Seeder;

class JenisTransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'kode_transaksi' => 'IN-0001',
                'nama_transaksi' => 'Biaya Pendaftaran Peserta Didik Baru',
                'jenis_transaksi' => 'pemasukan'
            ],
            [
                'kode_transaksi' => 'IN-0002',
                'nama_transaksi' => 'Pembayaran Biaya SPP',
                'jenis_transaksi' => 'pemasukan'
            ],
            [
                'kode_transaksi' => 'IN-0003',
                'nama_transaksi' => 'Pembayaran Biaya Ujian',
                'jenis_transaksi' => 'pemasukan'
            ],
            [
                'kode_transaksi' => 'IN-0004',
                'nama_transaksi' => 'Pemasukan Lainnya',
                'jenis_transaksi' => 'pemasukan'
            ],
            [
                'kode_transaksi' => 'OUT-0001',
                'nama_transaksi' => 'Gaji Guru',
                'jenis_transaksi' => 'pengeluaran'
            ],
            [
                'kode_transaksi' => 'OUT-0002',
                'nama_transaksi' => 'Pengeluaran Lainnya',
                'jenis_transaksi' => 'pengeluaran'
            ],
        ];

        foreach ($data as $item) {
            JenisTransaksi::create($item);
        }
    }
}
