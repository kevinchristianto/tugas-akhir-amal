<?php

namespace App\Http\Controllers;

use App\JenisTransaksi;
use App\Pendaftaran;
use App\Siswa;
use App\Transaksi;
use Illuminate\Http\Request;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Pendaftaran::all();

        return view('pages.pemasukan.pendaftaran.index', ['data' => $data]);
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
            'nis' => 'required|unique:siswa,nis',
            'nama' => 'required',
            'nama_wali' => 'required',
            'tanggal_lahir' => 'required',
            'jenis_kelamin' => 'required',
            'alamat' => 'required',
            'tanggal_bayar' => 'required',
        ]);
        $validated['nama'] = ucwords($validated['nama']);
        
        $siswa = Siswa::create($validated);

        if ($siswa) {
            $jenis_transaksi = JenisTransaksi::where('kode_transaksi', 'IN-0001')->first();
            $transaksi_data = [
                'jenis_id' => $jenis_transaksi->id,
                'nominal' => $validated['nominal'],
                'deskripsi' => 'Biaya pendaftaran untuk siswa baru atas nama ' . $validated['nama'] . ' sebesar Rp' . number_format($validated['nominal']),
                'tanggal_transaksi' => $validated['tanggal_bayar'],
                'reference_table' => 'pendaftaran',
                'reference_id' => null
            ];
            $transaksi = Transaksi::create($transaksi_data);

            $pendaftaran_data = [
                'siswa_id' => $siswa->id,
                'trx_id' => $transaksi->id
            ];
            $pendaftaran = Pendaftaran::create($pendaftaran_data);

            $transaksi->reference_id = $pendaftaran->id;
            $transaksi->save();

            return redirect()->route('pemasukan.pendaftaran.index')->withSuccess('Pendaftaran siswa baru berhasil ditambahkan! Data siswa telah ditambahkan ke dalam sistem, dan transaksi pembayaran pendaftaran peserta didik baru telah ditambahkan.');
        }

        return back()->withError('Gagal menambahkan data siswa baru dan transaksi pembayaran pendaftaran peserta didik baru.');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pendaftaran  $pendaftaran
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pendaftaran $pendaftaran)
    {
        $transaksi_id = $pendaftaran->detail_transaksi->id;

        Transaksi::where('id', $transaksi_id)->delete();

        return redirect()->route('pemasukan.pendaftaran.index')->withSuccess('Transaksi pendaftaran peserta didik baru berhasil dihapus');
    }
}
