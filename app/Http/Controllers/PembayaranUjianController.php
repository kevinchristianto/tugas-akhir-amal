<?php

namespace App\Http\Controllers;

use App\JenisTransaksi;
use App\PembayaranUjian;
use App\Siswa;
use App\Transaksi;
use Illuminate\Http\Request;

class PembayaranUjianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PembayaranUjian::all();
        $siswa = Siswa::all();

        return view('pages.pemasukan.ujian.index', ['data' => $data, 'siswa' => $siswa]);
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
            'semester' => 'required|in:ganjil,genap',
            'tahun' => 'required',
            'tanggal_bayar' => 'required'
        ]);

        $siswa = Siswa::where('id', $validated['siswa_id'])->first();
        $jenis_transaksi = JenisTransaksi::where('kode_transaksi', 'IN-0003')->first();
        $transaksi_data = [
            'jenis_id' => $jenis_transaksi->id,
            'nominal' => $validated['nominal'],
            'deskripsi' => 'Pembayaran biaya ujian semester ' . $validated['semester'] . ' ' . $validated['tahun'] . 'untuk siswa dengan nama ' . $siswa->nama . ' sebesar Rp' . number_format($validated['nominal']),
            'tanggal_transaksi' => $validated['tanggal_bayar'],
            'reference_table' => 'ujian',
            'reference_id' => null
        ];
        $transaksi = Transaksi::create($transaksi_data);

        $ujian_data = [
            'siswa_id' => $validated['siswa_id'],
            'semester' => $validated['semester'],
            'tahun' => $validated['tahun'],
            'tanggal_bayar' => $validated['tanggal_bayar'],
            'trx_id' => $transaksi->id
        ];
        $ujian = PembayaranUjian::create($ujian_data);

        $transaksi->reference_id = $ujian->id;
        $transaksi->save();

        return redirect()->route('pemasukan.ujian.index')->withSuccess('Pembayaran ujian telah berhasil disimpan');

        // return back()->withError('Gagal menyimpan pembayaran ujian bulanan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\PembayaranUjian  $ujian
     * @return \Illuminate\Http\Response
     */
    public function destroy(PembayaranUjian $ujian)
    {
        $transaksi_id = $ujian->detail_transaksi->id;

        Transaksi::where('id', $transaksi_id)->delete();

        return redirect()->route('pemasukan.ujian.index')->withSuccess('Transaksi pembayaran biaya ujian berhasil dihapus');
    }
}
