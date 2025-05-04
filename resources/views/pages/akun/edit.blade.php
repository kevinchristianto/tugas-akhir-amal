@extends('layout.app')

@section('title', 'Ubah Akun Keuangan')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Master</li>
    <li class="breadcrumb-item" aria-current="page">Akun Keuangan</li>
    <li class="breadcrumb-item active" aria-current="page">Ubah Akun Keuangan</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header py-3">
                        <h5 class="card-title">Ubah Akun - {{ $chartOfAccount->nama_akun }}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('master.account.update', $chartOfAccount->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label for="kategori">Kategori</label>
                                <select class="form-select" id="kategori" name="kategori" required>
                                    <option value selected disabled>--- Pilih kategori ---</option>
                                    <option value="aset" {{ $chartOfAccount->kategori == 'aset' ? 'selected' : '' }}>Aset</option>
                                    <option value="liabilitas" {{ $chartOfAccount->kategori == 'liabilitas' ? 'selected' : '' }}>Liabilitas</option>
                                    <option value="ekuitas" {{ $chartOfAccount->kategori == 'ekuitas' ? 'selected' : '' }}>Ekuitas</option>
                                    <option value="pendapatan" {{ $chartOfAccount->kategori == 'pendapatan' ? 'selected' : '' }}>Pendapatan</option>
                                    <option value="beban" {{ $chartOfAccount->kategori == 'beban' ? 'selected' : '' }}>Beban</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="kode-akun">Kode Akun</label>
                                <input type="text" class="form-control" id="kode-akun" name="kode_akun" placeholder="Masukkan kode akun" required value="{{ $chartOfAccount->kode_akun }}">
                            </div>
                            <div class="mb-3">
                                <label for="nama-akun">Nama Akun</label>
                                <input type="text" class="form-control" id="nama-akun" name="nama_akun" placeholder="Masukkan nama akun" required value="{{ $chartOfAccount->nama_akun }}">
                            </div>
                            <div class="mb-3">
                                <label for="saldo-normal">Saldo Normal</label>
                                <select class="form-select" id="saldo-normal" name="saldo_normal" required>
                                    <option value selected disabled>--- Pilih saldo normal ---</option>
                                    <option value="debit" {{ $chartOfAccount->saldo_normal == 'debit' ? 'selected' : '' }}>Debit</option>
                                    <option value="kredit" {{ $chartOfAccount->saldo_normal == 'kredit' ? 'selected' : '' }}>Kredit</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" rows="2" class="form-control" placeholder="Masukkan deskripsi akun">{{ $chartOfAccount->deskripsi }}</textarea>
                            </div>
                            <div class="d-flex flex-row justify-content-between">
                                <a href="{{ route('master.account.index') }}" class="btn btn-outline-secondary d-flex gap-2">
                                    <i class="ti ti-chevron-left"></i>
                                    Kembali
                                </a>
                                <button type="submit" class="btn btn-primary d-flex gap-2">
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