@extends('layout.app')

@section('title', 'Edit Data Siswa')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Master</li>
    <li class="breadcrumb-item" aria-current="page">Siswa</li>
    <li class="breadcrumb-item active" aria-current="page">Edit Data Siswa</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header py-3">
                        <h5 class="card-title">Edit Siswa - {{ $siswa->nama_lengkap }}</h5>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('master.siswa.update', $siswa->id) }}" method="POST">
                            @csrf
                            @method('patch')
                            <div class="mb-3">
                                <label for="tahun-ajaran">Tahun Ajaran</label>
                                <select name="tahun_ajaran" id="tahun-ajaran" class="form-control">
                                    <option value selected disabled>--- Pilih tahun ajaran ---</option>
                                    <option {{ $siswa->tahun_ajaran == '2019/2020' ? 'selected' : null }}>2019/2020</option>
                                    <option {{ $siswa->tahun_ajaran == '2020/2021' ? 'selected' : null }}>2020/2021</option>
                                    <option {{ $siswa->tahun_ajaran == '2021/2022' ? 'selected' : null }}>2021/2022</option>
                                    <option {{ $siswa->tahun_ajaran == '2022/2023' ? 'selected' : null }}>2022/2023</option>
                                    <option {{ $siswa->tahun_ajaran == '2023/2024' ? 'selected' : null }}>2023/2024</option>
                                    <option {{ $siswa->tahun_ajaran == '2024/2025' ? 'selected' : null }}>2024/2025</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="nis" class="form-label">NIS</label>
                                <input type="text" class="form-control" id="nis" name="nis" value="{{ $siswa->nis }}" placeholder="Masukkan NIS siswa" required>
                            </div>
                            <div class="mb-3">
                                <label for="nama_lengkap" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" id="nama_lengkap" name="nama_lengkap" value="{{ $siswa->nama_lengkap }}" placeholder="Masukkan nama lengkap siswa" required>
                            </div>
                            <div class="mb-3">
                                <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label>
                                <select class="form-select" id="jenis_kelamin" name="jenis_kelamin" required>
                                    <option value selected disabled>--- Pilih jenis kelamin ---</option>
                                    <option value="L" {{ $siswa->jenis_kelamin == 'L' ? 'selected' : null }}>Laki-laki</option>
                                    <option value="P" {{ $siswa->jenis_kelamin == 'P' ? 'selected' : null }}>Perempuan</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="{{ $siswa->tempat_lahir }}" placeholder="Masukkan tempat lahir siswa" required>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="{{ $siswa->tanggal_lahir }}" placeholder="Masukkan tanggal lahir siswa" required>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email" value="{{ $siswa->email }}" placeholder="Masukkan email siswa" required>
                            </div>
                            <div class="mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="30" rows="3" class="form-control" placeholder="Masukkan alamat siswa">{{ $siswa->alamat }}</textarea>
                            </div>
                            <div class="d-flex flex-row justify-content-between">
                                <a href="{{ route('master.siswa.index') }}" class="btn btn-outline-secondary d-flex gap-2 align-items-center">
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