<?php

namespace App\Http\Controllers;

use App\Models\ChartOfAccount;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function neraca(Request $request)
    {
        $akun_neraca = ChartOfAccount::with('detail_transaksi')
            ->orderBy('kategori')
            ->get()
            ->groupBy('kategori');

        return view('pages.laporan.neraca', compact('akun_neraca'));
    }
}
