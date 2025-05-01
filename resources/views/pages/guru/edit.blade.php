@extends('layout.app')

@section('title', 'Edit Data Guru')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Master</li>
    <li class="breadcrumb-item" aria-current="page">Guru</li>
    <li class="breadcrumb-item active" aria-current="page">Edit Data Guru</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header py-3">
                        <h5 class="card-title">Edit Guru - {{ $guru->nama_lengkap }}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('master.guru.update', $guru->id) }}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="mb-3">
                                <label for="nip" class="form-label">NIP</label>
                                <input type="text" class="form-control" id="nip" name="nip" value="{{ $guru->nip }}" placeholder="Masukkan NIP guru" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ $guru->nama_lengkap }}" placeholder="Masukkan nama lengkap guru" required>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value selected disabled>--- Pilih jenis kelamin ---</option>
                                    <option value="L" {{ $guru->jenis_kelamin == 'L' ? 'selected' : null }}>Laki-laki</option>
                                    <option value="P" {{ $guru->jenis_kelamin == 'P' ? 'selected' : null }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="no_hp" class="form-label">No HP</label>
                                <input type="text" class="form-control" id="no_hp" name="no_hp" value="{{ $guru->no_hp }}" placeholder="Masukkan No HP guru" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" placeholder="Masukkan alamat guru">{{ $guru->alamat }}</textarea>
                            </div>
                            <div class="d-flex flex-row justify-content-between">
                                <a href="{{ route('master.guru.index') }}" class="btn btn-outline-secondary d-flex gap-2 align-items-center">
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