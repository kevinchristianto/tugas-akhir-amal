<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Siswa::with('waliMurid')->paginate(10);

        return view('pages.siswa.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.siswa.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tahun_ajaran' => 'required|string|max:9',
            'nis' => 'required|integer|max_digits:10',
            'nama_lengkap' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'email' => 'nullable|string|email|max:100|unique:siswa',
            'alamat' => 'required|string|max:1000',
        ]);

        Siswa::create($validated);

        return redirect()->route('master.siswa.index')->with('success', 'Data siswa berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        return view('pages.siswa.edit', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $validated = $request->validate([
            'tahun_ajaran' => 'required|string|max:9',
            'nis' => 'required|integer|max_digits:10',
            'nama_lengkap' => 'required|string|max:100',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:100',
            'tanggal_lahir' => 'required|date',
            'email' => [
                'nullable',
                'string',
                'email',
                'max:100',
                Rule::unique('siswa')->ignore($siswa->id),
            ],
            'alamat' => 'required|string|max:1000',
        ]);

        $siswa->update($validated);

        return redirect()->route('master.siswa.index')->with('success', 'Data siswa berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        $siswa->delete();

        return redirect()->route('master.siswa.index')->with('success', 'Data siswa berhasil dihapus!');
    }
}
