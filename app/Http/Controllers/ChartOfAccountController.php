<?php

namespace App\Http\Controllers;

use App\Models\ChartOfAccount;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ChartOfAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $data = ChartOfAccount::orderBy('kode_akun')->paginate(10);
        $hehe = ChartOfAccount::withSum('detail_transaksi as total_debit', 'debit')
                ->withSum('detail_transaksi as total_kredit', 'kredit')
                ->get();

        return view('pages.akun.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.akun.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kode_akun' => 'required|string|max:10|unique:chart_of_accounts',
            'nama_akun' => 'required|string|max:100',
            'saldo_normal' => 'required|in:debit,kredit',
            'kategori' => 'required|in:aset,liabilitas,ekuitas,pendapatan,beban',
            'deskripsi' => 'nullable|string|max:1000',
        ]);

        ChartOfAccount::create($validated);

        return redirect()->route('master.account.index')->with('success', 'Akun baru berhasil ditambahkan!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ChartOfAccount $chartOfAccount)
    {
        return view('pages.akun.edit', compact('chartOfAccount'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ChartOfAccount $chartOfAccount)
    {
        $validated = $request->validate([
            'kode_akun' => [
                'required',
                'string',
                'max:10',
                Rule::unique('chart_of_accounts')->ignore($chartOfAccount->id),
            ],
            'nama_akun' => 'required|string|max:100',
            'saldo_normal' => 'required|in:debit,kredit',
            'kategori' => 'required|in:aset,liabilitas,ekuitas,pendapatan,beban',
            'deskripsi' => 'nullable|string|max:1000',
        ]);

        $chartOfAccount->update($validated);

        return redirect()->route('master.account.index')->with('success', 'Akun berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ChartOfAccount $chartOfAccount)
    {
        $chartOfAccount->delete();

        return redirect()->route('master.account.index')->with('success', 'Akun berhasil dihapus!');
    }
}
