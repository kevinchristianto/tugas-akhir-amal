<?php

namespace App\Http\Controllers;

use App\JenisTransaksi;
use App\Siswa;
use App\SPP;
use App\Transaksi;
use Illuminate\Http\Request;

class SPPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = SPP::all();
        $siswa = Siswa::all();

        return view('pages.pemasukan.spp.index', ['data' => $data, 'siswa' => $siswa]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nominal' => 'required',
            'siswa_id' => 'required|exists:siswa,id',
            'periode' => 'required',
            'tanggal_bayar' => 'required'
        ]);
        $validated['periode'] = $validated['periode'] . '-01';

        $siswa = Siswa::where('id', $validated['siswa_id'])->first();
        $jenis_transaksi = JenisTransaksi::where('kode_transaksi', 'IN-0002')->first();
        $transaksi_data = [
            'jenis_id' => $jenis_transaksi->id,
            'nominal' => $validated['nominal'],
            'deskripsi' => 'Pembayaran biaya SPP bulan ' . date_format(date_create($validated['periode']), 'F Y') . ' untuk siswa dengan nama ' . $siswa->nama . ' sebesar Rp' . number_format($validated['nominal']),
            'tanggal_transaksi' => $validated['tanggal_bayar'],
            'reference_table' => 'spp',
            'reference_id' => null
        ];
        $transaksi = Transaksi::create($transaksi_data);

        $spp_data = [
            'siswa_id' => $validated['siswa_id'],
            'periode' => $validated['periode'],
            'tanggal_bayar' => $validated['tanggal_bayar'],
            'trx_id' => $transaksi->id
        ];
        $spp = SPP::create($spp_data);

        $transaksi->reference_id = $spp->id;
        $transaksi->save();

        return redirect()->route('pemasukan.spp.index')->withSuccess('Pembayaran SPP telah berhasil disimpan');

        // return back()->withError('Gagal menyimpan pembayaran SPP bulanan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SPP  $sPP
     * @return \Illuminate\Http\Response
     */
    public function destroy(SPP $spp)
    {
        $transaksi_id = $spp->detail_transaksi->id;

        Transaksi::where('id', $transaksi_id)->delete();

        return redirect()->route('pemasukan.spp.index')->withSuccess('Transaksi pembayaran SPP berhasil dihapus');
    }
}
