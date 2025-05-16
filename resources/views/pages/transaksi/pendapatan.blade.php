@extends('layout.app')

@section('title', 'Administrasi Siswa')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Transaksi</li>
    <li class="breadcrumb-item active" aria-current="page">Administrasi Siswa</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h5 class="card-title">Administrasi Siswa</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('transaksi.store_pendapatan') }}" method="post">
                            @csrf
                            @method('post')
                            <div class="row mb-3">
                                <div class="col-12 col-lg-4 col-md-6 mb-3">
                                    <label for="nomor-transaksi" class="form-label">Kode Transaksi</label>
                                    <input type="text" class="form-control" id="nomor-transaksi" name="nomor_transaksi" required readonly value="{{ $nomor_transaksi }}">
                                    <small class="text-muted">Kode transaksi di-generate secara otomatis</small>
                                </div>
                                <div class="col-12 col-lg-4 col-md-6 mb-3">
                                    <label for="tanggal" class="form-label">Tanggal Diterima</label>
                                    <input type="date" class="form-control" id="tanggal" name="tanggal" required value="{{ date('Y-m-d') }}">
                                </div>
                                <div class="col-12 col-lg-4 col-md-6 mb-3">
                                    <label for="nama-siswa" class="form-label">Nama Siswa</label>
                                    <select name="siswa_id" id="nama-siswa" class="form-control" required>
                                        <option value selected disabled>--- Pilih siswa ---</option>
                                        @foreach ($siswa as $item)
                                            <option value="{{ $item->id }}">{{ $item->nama_lengkap }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-lg-4 col-md-6 mb-3">
                                    <label for="akun-pendapatan" class="form-label">Transaksi</label>
                                    <select name="akun_pendapatan" id="akun-pendapatan" class="form-control" required>
                                        <option value selected disabled>--- Pilih transaksi ---</option>
                                        @foreach ($akun_pendapatan as $pendapatan)
                                            <option value="{{ $pendapatan->id }}">{{ str_replace('Pendapatan ', '', $pendapatan->nama_akun) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-lg-4 col-md-6 mb-3">
                                    <label for="akun-kas" class="form-label">Akun Kas</label>
                                    <select name="akun_kas" id="akun-kas" class="form-control" required>
                                        <option value selected disabled>--- Pilih kas masuknya uang ---</option>
                                        @foreach ($akun_kas as $kas)
                                            <option value="{{ $kas->id }}">{{ $kas->kode_akun }} - {{ $kas->nama_akun }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-lg-4 col-md-6 mb-3">
                                    <label for="nominal" class="form-label">Nominal</label>
                                    <input type="text" class="form-control currency" id="nominal" name="nominal" required>
                                </div>
                                <div class="col-12">
                                    <label for="deskripsi">Deskripsi/Keterangan</label>
                                    <textarea name="deskripsi" id="deskripsi" class="form-control" rows="2" required placeholder="Pembayaran SPP bulan April"></textarea>
                                </div>
                            </div>
                            <div class="d-flex justify-content-end gap-2">
                                <button class="btn btn-light-primary d-flex align-items-center gap-2">
                                    <i class="ti ti-device-floppy"></i>
                                    Simpan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-style')
    <link rel="stylesheet" href="{{ asset('assets/plugins/selectize/selectize.min.css') }}" />
@endsection

@section('custom-script')
    <script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/selectize/selectize.min.js') }}"></script>
    <script>
        let options = {}
        $('select.form-control').selectize(options)

        $(document).ready(function () {
            $('.currency').inputmask({
                'alias': 'currency',
                'removeMaskOnSubmit': true,
                'autoUnmask': true,
                'digits': 2,
                'prefix': 'Rp',
                'rightAlign': false,
                'groupSeparator': '.',
                'radixPoint': ',',
                'digitsOptional': true,
            })

            @if (session()->has('download_kuitansi'))
                window.open('{{ route('stream-spp', ['filename' => session()->get('download_kuitansi')]) }}', '_blank')
            @endif
        })
    </script>
@endsection