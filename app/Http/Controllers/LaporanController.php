<?php

namespace App\Http\Controllers;

use App\Transaksi;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function index()
    {
        return view('pages.laporan.index');
    }

    public function print(Request $request)
    {
        $data = Transaksi::with('jenis')
            ->whereBetween('tanggal_transaksi', [$request->start_date, $request->end_date])
            ->orderBy('tanggal_transaksi')
            ->get();

        $pdf = PDF::loadview('pages.laporan.print', [
            'laporan' => $data
        ])->setPaper('A4', 'landscape');

        return $pdf->stream();
    }
}
