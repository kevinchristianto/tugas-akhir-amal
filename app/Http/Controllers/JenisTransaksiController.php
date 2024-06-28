<?php

namespace App\Http\Controllers;

use App\JenisTransaksi;
use Illuminate\Http\Request;

class JenisTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = JenisTransaksi::all();

        return view('pages.jenis_transaksi.index', ['data' => $data]);
    }
}
