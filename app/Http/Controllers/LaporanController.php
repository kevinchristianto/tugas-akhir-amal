<?php

namespace App\Http\Controllers;

use App\Models\ChartOfAccount;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;

class LaporanController extends Controller
{
    public function neraca(Request $request)
    {
        $akun_neraca = ChartOfAccount::with('detail_transaksi')
            ->orderBy('kategori')
            ->get()
            ->groupBy('kategori');

        if ($request->get('mode') == 'print') {
            $pdf = Pdf::loadView('pages.print.neraca', compact('akun_neraca'));
            
            return $pdf->stream('Neraca.pdf');
        }

        return view('pages.laporan.neraca', compact('akun_neraca'));
    }

    public function arus_kas(Request $request)
    {
        $akunKas = ChartOfAccount::where('kategori', 'aset')
            ->where(function ($q) {
                $q->where('nama_akun', 'like', '%kas%')
                ->orWhere('nama_akun', 'like', '%bank%');
            })
            ->pluck('id');

        $bulan = date('m');
        $tahun = date('Y');
        $detail_kas = DetailTransaksi::whereIn('chart_of_account_id', $akunKas)
            ->whereHas('transaksi', function ($q) use ($bulan, $tahun) {
                $q->whereMonth('tanggal', $bulan);
                $q->whereYear('tanggal', $tahun);
            })
            ->get();

        $kas_masuk = $detail_kas->where('debit', '>', 0)->sum('debit');
        $kas_keluar = $detail_kas->where('kredit', '>', 0)->sum('kredit');
        $saldo_akhir = $kas_masuk - $kas_keluar;

        if ($request->get('mode') == 'print') {
            $pdf = Pdf::loadView('pages.print.arus-kas', compact('detail_kas', 'saldo_akhir', 'kas_masuk', 'kas_keluar'));

            return $pdf->stream('Arus Kas.pdf');

        }

        return view('pages.laporan.arus-kas', compact('detail_kas', 'saldo_akhir', 'kas_masuk', 'kas_keluar'));
    }

    public function jurnal_umum(Request $request)
    {
        $bulan = date('m');
        $tahun = date('Y');

        $transaksi = Transaksi::with(['detail.akun'])
            ->whereMonth('tanggal', $bulan)
            ->whereYear('tanggal', $tahun)
            ->orderBy('tanggal')
            ->get();

        if ($request->get('mode') == 'print') {
            $pdf = Pdf::loadView('pages.print.jurnal-umum', compact('transaksi'));

            return $pdf->stream('Jurnal Umum.pdf');
        }

        return view('pages.laporan.jurnal-umum', compact('transaksi'));
    }
}
