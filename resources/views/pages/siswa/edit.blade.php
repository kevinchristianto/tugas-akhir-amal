@extends('layouts.index')

@section('page-title', 'Master Data Siswa')

@section('main-content')
<div class="d-flex flex-column flex-column-fluid">
    <div id="kt_app_toolbar" class="app-toolbar pt-5">
        <div id="kt_app_toolbar_container" class="app-container container-fluid d-flex align-items-stretch">
            <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
                    <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
                        <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
                            <a href="{{ url('/') }}" class="text-gray-500">
                                <i class="ki-duotone ki-home fs-3 text-gray-400 me-n1"></i>
                            </a>
                        </li>
                        <li class="breadcrumb-item">
                            <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                        </li>
                        <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Master Data</li>
                        <li class="breadcrumb-item">
                            <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                        </li>
                        <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Siswa</li>
                        <li class="breadcrumb-item">
                            <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                        </li>
                        <li class="breadcrumb-item text-gray-700">Edit Siswa</li>
                    </ul>
                    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">Edit Siswa</h1>
                </div>
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="row gx-5 gx-xl-10">
                <div class="col-12">
                    <div class="card card-flush">
                        <div class="card-body">
                            <form action="{{ route('master.siswa.update', $siswa->id) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="mb-4">
                                    <label class="required fs-5 fw-semibold mb-2">NIS</label>
                                    <input type="text" class="form-control form-control-solid" name="nis" required value="{{ $siswa->nis }}">
                                </div>
                                <div class="mb-4">
                                    <label class="required fs-5 fw-semibold mb-2">Nama Siswa</label>
                                    <input type="text" class="form-control form-control-solid" name="nama" required value="{{ $siswa->nama }}">
                                </div>
                                <div class="mb-4">
                                    <label class="required fs-5 fw-semibold mb-2">Nama Wali</label>
                                    <input type="text" class="form-control form-control-solid" name="nama_wali" required value="{{ $siswa->nama_wali }}">
                                </div>
                                <div class="mb-4">
                                    <label class="required fs-5 fw-semibold mb-2">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control form-control-solid" required>
                                        <option value selected disabled>--- Pilih Jenis Kelamin ---</option>
                                        <option value="L" {{ $siswa->jenis_kelamin == 'L' ? 'selected' : null }}>Laki-laki</option>
                                        <option value="P" {{ $siswa->jenis_kelamin == 'P' ? 'selected' : null }}>Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-4">
                                    <label class="required fs-5 fw-semibold mb-2">Tanggal Lahir</label>
                                    <input type="date" class="form-control form-control-solid" name="tanggal_lahir" required value="{{ $siswa->tanggal_lahir }}">
                                </div>
                                <div class="mb-4">
                                    <label class="required fs-5 fw-semibold mb-2">Alamat</label>
                                    <textarea name="alamat" class="form-control form-control-solid" required>{{ $siswa->alamat }}</textarea>
                                </div>
            
                                <div class="separator mb-8"></div>
                                
                                <div class="d-flex justify-content-end">
                                    <a href="{{ route('master.siswa.index') }}" class="btn btn-secondary me-2">
                                        Batal
                                    </a>
                                    <button type="submit" class="btn btn-primary">
                                        <i data-feather="save" class="me-2 h-20px"></i>
                                        Simpan
                                    </button>
                                </div>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection