@extends('layout.app')

@section('title', 'Tambah User Baru')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Master</li>
    <li class="breadcrumb-item" aria-current="page">User</li>
    <li class="breadcrumb-item active" aria-current="page">User Baru</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header py-3">
                        <h5 class="card-title">Tambah User Baru</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('master.user.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan nama user" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
                            </div>
                            <div class="mb-3">
                                <label for="password-confirmation" class="form-label">Konfirmasi Password</label>
                                <input type="password" class="form-control" id="password-confirmation" name="password_confirmation" placeholder="Masukkan password" required>
                            </div>
                            <!-- <div class="mb-3">
                                <label for="level" class="form-label">Level</label>
                                <select class="form-select" id="level" name="level" required>
                                    <option value selected disabled>--- Pilih level ---</option>
                                    <option value="admin">Admin</option>
                                    <option value="keuangan">Staff Keuangan</option>
                                    <option value="tu">Staff Tata Usaha</option>
                                </select>
                            </div> -->
                            <div class="d-flex flex-row justify-content-between">
                                <a href="{{ route('master.user.index') }}" class="btn btn-light-secondary d-flex gap-2 align-items-center">
                                    <i class="ti ti-chevron-left"></i>
                                    Kembali
                                </a>
                                <button type="submit" class="btn btn-light-primary d-flex gap-2 align-items-center">
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