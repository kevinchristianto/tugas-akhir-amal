@extends('layout.app')

@section('title', 'Kelola Jurnal Umum')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Transaksi</li>
    <li class="breadcrumb-item active" aria-current="page">Jurnal Umum</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Jurnal Umum</h5>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-new-entry" class="btn btn-outline-primary d-flex gap-2 align-items-center">
                                <i class="ti ti-library-plus"></i>
                                Entri Baru
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover table-sm" style="table-layout: auto; width: 100%;">
                                <thead>
                                    <tr>
                                        <th>Kode Transaksi</th>
                                        <th>Tanggal</th>
                                        <th>Deskripsi</th>
                                        <th>Akun</th>
                                        <th>Debit</th>
                                        <th>Kredit</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $item)
                                        <tr>
                                            <td rowspan="3">{{ $item->nomor_transaksi }}</td>
                                            <td rowspan="3">{{ $item->tanggal }}</td>
                                            <td rowspan="3">{{ $item->deskripsi }}</td>
                                        </tr>
                                        @foreach ($item->detail as $detail)
                                            <tr>
                                                <td>{{ $detail->akun->kode_akun }} - {{ $detail->akun->nama_akun }}</td>
                                                <td>Rp{{ number_format($detail->debit) }}</td>
                                                <td>Rp{{ number_format($detail->kredit) }}</td>
                                                <td>{{ $detail->deskripsi }}</td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('modal-section')
    <div class="modal fade" id="modal-new-entry" data-bs-backdrop="static" data-bs-keyboard="false">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Entri Baru</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('transaksi.store') }}" method="post">
                        @csrf
                        @method('post')
                        <div class="row mb-3">
                            <div class="col-12 col-md-4">
                                <label for="nomor-transaksi" class="form-label">Kode Transaksi</label>
                                <input type="text" class="form-control" id="nomor-transaksi" name="nomor_transaksi" required readonly value="{{ $nomor_transaksi }}">
                                <small class="text-muted">Kode transaksi di-generate secara otomatis</small>
                            </div>
                            <div class="col-12 col-md-4">
                                <label for="tanggal" class="form-label">Tanggal</label>
                                <input type="date" class="form-control" id="tanggal" name="tanggal" required value="{{ date('Y-m-d') }}">
                            </div>
                            <div class="col-12 col-md-4">
                                <label for="jenis-transaksi" class="form-label">Jenis Transaksi</label>
                                <select name="jenis_transaksi" class="form-control" required>
                                    <option value selected disabled>--- Pilih jenis transaksi ---</option>
                                    <option value="pemasukan">Kas Masuk</option>
                                    <option value="pengeluaran">Kas Keluar</option>
                                </select>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" id="deskripsi" class="form-control" rows="2" required placeholder="Masukkan deskripsi"></textarea>
                        </div>
                        <table class="table table-striped table-sm mb-3" id="transaksi-table">
                            <thead>
                                <tr>
                                    <th style="width: 30%">Akun</th>
                                    <th>Debit</th>
                                    <th>Kredit</th>
                                    <th style="width: 30%">Keterangan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @for ($i = 0; $i < 2; $i++)
                                    <tr>
                                        <td>
                                            <select name="account[]" class="form-control" required>
                                                <option value selected disabled>--- Pilih akun ---</option>
                                                @foreach ($accounts as $akun)
                                                    <option value="{{ $akun->id }}">{{ $akun->kode_akun }} - {{ $akun->nama_akun }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" name="debit[]" class="form-control currency" required value="0">
                                        </td>
                                        <td>
                                            <input type="text" name="kredit[]" class="form-control currency" required value="0">
                                        </td>
                                        <td>
                                            <textarea name="keterangan[]" class="form-control" rows="2" placeholder="Tidak ada keterangan"></textarea>
                                        </td>
                                    </tr>
                                @endfor
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end gap-2">
                            <a href="#" data-bs-dismiss="modal" class="btn btn-outline-danger d-flex align-items-center gap-2">
                                <i class="ti ti-x"></i>
                                Batal
                            </a>
                            <button class="btn btn-outline-primary d-flex align-items-center gap-2">
                                <i class="ti ti-device-floppy"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
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
        })
    </script>
@endsection