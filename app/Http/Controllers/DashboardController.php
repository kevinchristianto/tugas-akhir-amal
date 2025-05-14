<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Models\Guru;
use App\Models\Siswa;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $total_siswa = Siswa::count();
        $total_guru = Guru::count();
        $pemasukan = DetailTransaksi::whereHas('akun', fn ($q) => 
            $q->where('kategori', 'pendapatan'))
        ->whereHas('transaksi', fn ($q) => 
            $q->thisMonth())
        ->sum('kredit');
        $pengeluaran = DetailTransaksi::whereHas('akun', fn ($q) =>
            $q->where('kategori', 'beban'))
        ->whereHas('transaksi', fn ($q) =>
            $q->thisMonth())
        ->sum('debit');

        return view('pages.dashboard.index', compact('total_siswa', 'total_guru', 'pemasukan', 'pengeluaran'));
    }
}
