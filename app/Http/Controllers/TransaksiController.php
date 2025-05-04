<?php

namespace App\Http\Controllers;

use App\Models\ChartOfAccount;
use App\Models\DetailTransaksi;
use App\Models\Transaksi;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaksi::with(['detail.akun'])->orderBy('tanggal', 'desc')->paginate(10);
        // dd($data);
        $accounts = ChartOfAccount::all();

        $trx_date = date('Y.m.d');
        $count_trx = Transaksi::where('nomor_transaksi', 'like', $trx_date . '.%')->count();
        $count_trx += 1;
        $count_trx = str_pad($count_trx, 4, '0', STR_PAD_LEFT);
        $nomor_transaksi = $trx_date . '.' . $count_trx;

        return view('pages.transaksi.index', compact('data', 'accounts', 'nomor_transaksi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'nomor_transaksi' => 'required',
            'deskripsi' => 'required',
            'jenis_transaksi' => 'required|in:pemasukan,pengeluaran',
            'account' => 'required|array|min:2',
            'kredit' => 'required|array|min:2',
            'debit' => 'required|array|min:2',
            'keterangan' => 'nullable|array|min:2',
        ]);
        
        $transaksi = Transaksi::create([
            'tanggal' => $validated['tanggal'],
            'nomor_transaksi' => $validated['nomor_transaksi'],
            'deskripsi' => $validated['deskripsi'],
            'tipe_transaksi' => $validated['jenis_transaksi'],
        ]);
        foreach ($request->get('account') as $key => $account) {
            $data = [
                'transaksi_id' => $transaksi->id,
                'chart_of_account_id' => $account,
                'kredit' => $request->get('kredit')[$key],
                'debit' => $request->get('debit')[$key],
                'deskripsi' => $request->get('keterangan')[$key],
            ];

            DetailTransaksi::create($data);
        }

        return redirect()->route('transaksi.index')->with('success', 'Jurnal umum berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaksi $transaksi)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaksi $transaksi)
    {
        //
    }
}
