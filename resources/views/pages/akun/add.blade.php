@extends('layout.app')

@section('title', 'Tambah Akun Keuangan Baru')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Master</li>
    <li class="breadcrumb-item" aria-current="page">Akun Keuangan</li>
    <li class="breadcrumb-item active" aria-current="page">Buat Akun Baru</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header py-3">
                        <h5 class="card-title">Buat Akun Baru</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('master.account.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="kategori">Kategori</label>
                                <select class="form-select" id="kategori" name="kategori" required>
                                    <option value selected disabled>--- Pilih kategori ---</option>
                                    <option value="aset">Aset</option>
                                    <option value="liabilitas">Liabilitas</option>
                                    <option value="ekuitas">Ekuitas</option>
                                    <option value="pendapatan">Pendapatan</option>
                                    <option value="beban">Beban</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="kode-akun">Kode Akun</label>
                                <input type="text" class="form-control" id="kode-akun" name="kode_akun" placeholder="Masukkan kode akun" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama-akun">Nama Akun</label>
                                <input type="text" class="form-control" id="nama-akun" name="nama_akun" placeholder="Masukkan nama akun" required>
                            </div>
                            <div class="mb-3">
                                <label for="saldo-normal">Saldo Normal</label>
                                <select class="form-select" id="saldo-normal" name="saldo_normal" required>
                                    <option value selected disabled>--- Pilih saldo normal ---</option>
                                    <option value="debit">Debit</option>
                                    <option value="kredit">Kredit</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" rows="2" class="form-control" placeholder="Masukkan deskripsi akun"></textarea>
                            </div>
                            <div class="d-flex flex-row justify-content-between">
                                <a href="{{ route('master.account.index') }}" class="btn btn-outline-secondary d-flex gap-2 align-items-center">
                                    <i class="ti ti-chevron-left"></i>
                                    Kembali
                                </a>
                                <button type="submit" class="btn btn-primary d-flex gap-2 align-items-center">
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