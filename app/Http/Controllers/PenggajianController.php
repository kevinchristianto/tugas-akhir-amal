<?php

namespace App\Http\Controllers;

use App\Guru;
use App\JenisTransaksi;
use App\Penggajian;
use App\Transaksi;
use Illuminate\Http\Request;

class PenggajianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Penggajian::all();
        $guru = Guru::all();

        return view('pages.pengeluaran.gaji.index', ['data' => $data, 'guru' => $guru]);
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
            'guru_id' => 'required|exists:guru,id',
            'periode' => 'required',
            'tanggal_bayar' => 'required'
        ]);
        $validated['periode'] = $validated['periode'] . '-01';

        $guru = Guru::where('id', $validated['guru_id'])->first();
        $jenis_transaksi = JenisTransaksi::where('kode_transaksi', 'OUT-0001')->first();
        $transaksi_data = [
            'jenis_id' => $jenis_transaksi->id,
            'nominal' => $validated['nominal'],
            'deskripsi' => 'Pembayaran gaji bulan ' . date_format(date_create($validated['periode']), 'F Y') . ' untuk guru dengan nama ' . $guru->nama . ' sebesar Rp' . number_format($validated['nominal']),
            'tanggal_transaksi' => $validated['tanggal_bayar'],
            'reference_table' => 'spp',
            'reference_id' => null
        ];
        $transaksi = Transaksi::create($transaksi_data);

        $spp_data = [
            'guru_id' => $validated['guru_id'],
            'periode' => $validated['periode'],
            'tanggal_bayar' => $validated['tanggal_bayar'],
            'trx_id' => $transaksi->id
        ];
        $spp = Penggajian::create($spp_data);

        $transaksi->reference_id = $spp->id;
        $transaksi->save();

        return redirect()->route('pengeluaran.gaji.index')->withSuccess('Pembayaran gaji guru telah berhasil disimpan');

        // return back()->withError('Gagal menyimpan pembayaran SPP bulanan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Penggajian  $gaji
     * @return \Illuminate\Http\Response
     */
    public function destroy(Penggajian $gaji)
    {
        $transaksi_id = $gaji->detail_transaksi->id;

        Transaksi::where('id', $transaksi_id)->delete();

        return redirect()->route('pengeluaran.gaji.index')->withSuccess('Transaksi pembayaran gaji guru berhasil dihapus');
    }
}
