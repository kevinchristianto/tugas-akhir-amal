<?php

namespace App\Http\Controllers;

use App\Models\WaliMurid;
use Illuminate\Http\Request;

class WaliMuridController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_ayah' => 'nullable|string',
            'nama_ibu' => 'nullable|string',
            'no_hp' => 'required|string',
            'email' => 'nullable|string|email',
            'siswa_id' => 'required|integer|exists:siswa,id',
        ]);

        WaliMurid::create($validated);

        return redirect()->route('master.siswa.index')->with('success', 'Data wali murid berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, $siswa_id)
    {
        $wali = WaliMurid::where('siswa_id', $siswa_id)->first();

        return response()->json([
            'isEmpty' => !isset($wali),
            'data' => $wali,
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, WaliMurid $waliMurid)
    {
        $validated = $request->validate([
            'nama_ayah' => 'nullable|string',
            'nama_ibu' => 'nullable|string',
            'no_hp' => 'required|string',
            'email' => 'nullable|string|email',
            'siswa_id' => 'required|integer|exists:siswa,id',
        ]);

        $waliMurid->update($validated);

        return redirect()->route('master.siswa.index')->with('success', 'Data wali murid berhasil diperbarui!');
    }
}
