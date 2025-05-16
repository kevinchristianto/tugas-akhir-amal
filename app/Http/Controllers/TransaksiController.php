<?php

namespace App\Http\Controllers;

use App\Mail\Kuitansi;
use App\Models\ChartOfAccount;
use App\Models\DetailTransaksi;
use App\Models\Siswa;
use App\Models\Transaksi;
use App\Models\TransaksiPendapatan;
use App\Models\WaliMurid;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Ngekoding\Terbilang\Terbilang;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Transaksi::with(['detail.akun'])->orderBy('created_at', 'desc')->paginate(10);
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
            'deskripsi' => $validated['deskripsi'] ?? 'Tidak ada keterangan',
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

    public function pendapatan()
    {
        $akun_pendapatan = ChartOfAccount::where('kategori', 'pendapatan')->where('kategori', 'pendapatan')->get();
        $akun_kas = ChartOfAccount::where('kategori', 'aset')->get();
        $siswa = Siswa::all();
        
        $trx_date = date('Y.m.d');
        $count_trx = Transaksi::where('nomor_transaksi', 'like', $trx_date . '.%')->count();
        $count_trx += 1;
        $count_trx = str_pad($count_trx, 4, '0', STR_PAD_LEFT);
        $nomor_transaksi = $trx_date . '.' . $count_trx;

        return view('pages.transaksi.pendapatan', compact('nomor_transaksi', 'akun_kas', 'siswa', 'akun_pendapatan'));
    }

    public function store_pendapatan(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'nomor_transaksi' => 'required',
            'siswa_id' => 'required|exists:siswa,id',
            'akun_pendapatan' => 'required|exists:chart_of_accounts,id',
            'akun_kas' => 'required|exists:chart_of_accounts,id',
            'nominal' => 'required|numeric',
            'deskripsi' => 'required|string'
        ]);
        $siswa = Siswa::find($validated['siswa_id']);
        $transaksi = Transaksi::create([
            'tanggal' => $validated['tanggal'],
            'nomor_transaksi' => $validated['nomor_transaksi'],
            'deskripsi' => $validated['deskripsi'],
            'tipe_transaksi' => 'pemasukan',
        ]);
        $pendapatan = TransaksiPendapatan::create([
            'siswa_id' => $validated['siswa_id'],
            'transaksi_id' => $transaksi->id,
            'chart_of_account_id' => $validated['akun_pendapatan'],
        ]);
        $detail_transaksi = DetailTransaksi::upsert([
            [
                'transaksi_id' => $transaksi->id,
                'chart_of_account_id' => $validated['akun_pendapatan'],
                'kredit' => $validated['nominal'],
                'debit' => 0,
                'deskripsi' => 'Tidak ada keterangan',
            ],
            [
                'transaksi_id' => $transaksi->id,
                'chart_of_account_id' => $validated['akun_kas'],
                'kredit' => 0,
                'debit' => $validated['nominal'],
                'deskripsi' => 'Tidak ada keterangan',
            ]
        ], []);

        if (!$detail_transaksi) {
            $transaksi->delete();
            $pendapatan->delete();

            return redirect()->route('transaksi.pendapatan')->with('error', 'Pembayaran pendapatan gagal ditambahkan!');
        }

        $data = [
            ...$pendapatan->toArray(),
            'siswa' => $siswa->toArray(),
            'transaksi' => $transaksi->toArray(),
            'nominal' => $validated['nominal']
        ];

        return $this->send_kuitansi($data);
    }

    public function send_kuitansi($data)
    {
        $akun = ChartOfAccount::find($data['chart_of_account_id']);
        $nama_akun = str_replace('Pendapatan ', '', $akun->nama_akun);
        // preg_match('/Rp\s?\d{1,3}(?:[.,]\d{3})*(?:[.,]\d+)?/', $data['transaksi']['deskripsi'], $nominal);
        // $cleaned_nominal = preg_replace('/Rp\s?/', '', $nominal[0]);
        // $normalized_nominal = preg_replace('/[.,]/', '', $cleaned_nominal);
        $terbilang = ucwords(Terbilang::convert($data['nominal']) . ' rupiah');

        $data['terbilang'] = $terbilang;
        $data['printed_at'] = now()->format('d F Y, H:i:s');
        $data['nama_akun'] = $nama_akun;
        $pdf = Pdf::loadView('pages.print.kuitansi', $data);

        $month = now()->format('F Y');
        if (!Storage::disk('local')->exists('kuitansi/' . $month)) {
            Storage::disk('local')->makeDirectory('kuitansi/' . $month);
        }
        
        $filename = storage_path('app/private/kuitansi/' . $month . '/' . $data['siswa']['nis'] . '_' . time() . '.pdf');
        $pdf->save($filename);

        $urlencoded_filename = urlencode($filename);
        request()->session()->flash('download_kuitansi', $urlencoded_filename);

        if (WaliMurid::where('siswa_id', $data['siswa']['id'])->exists()) {
            $email = WaliMurid::where('siswa_id', $data['siswa']['id'])->first()->email;

            Mail::to($email)->send(new Kuitansi($data, $filename));

            return redirect()->route('transaksi.pendapatan')->with('success', 'Kuitansi pembayaran SPP berhasil dikirimkan ke ' . $email);
        }

        return redirect()->route('transaksi.pendapatan')->with('error', 'Pembayaran SPP berhasil disimpan, namun kuitansi tidak dapat dikirimkan karena siswa terkait tidak memiliki wali murid yang terdata.');
    }

    public function stream_spp(Request $request)
    {
        $filename = urldecode($request->get('filename'));
        // preg_match('#(kuitansi/\d{4}|kuitansi/[A-Za-z]+\s\d{4})/[^/]+\.pdf$#', $filename, $matches);
        // $filename = $matches[0];
        // $pdf = storage_path($filename);

        return response()->file($filename, ['Content-Type' => 'application/pdf', 'Content-Disposition' => 'inline; filename="' . $filename . '"']);
    }
}
