<?php

namespace App\Http\Controllers;

use App\Transaksi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $pemasukan = Transaksi::whereHas('jenis', function ($query) {
            $query->where('jenis_transaksi', 'pemasukan');
        })->get()->toArray();
        $pengeluaran = Transaksi::whereHas('jenis', function ($query) {
            $query->where('jenis_transaksi', 'pengeluaran');
        })->get()->toArray();

        $pemasukan = array_sum(array_column($pemasukan, 'nominal'));
        $pengeluaran = array_sum(array_column($pengeluaran, 'nominal'));

        return view('pages.home', [
            'pemasukan' => $pemasukan,
            'pengeluaran' => $pengeluaran
        ]);
    }
}
