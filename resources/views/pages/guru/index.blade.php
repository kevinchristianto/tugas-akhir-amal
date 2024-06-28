@extends('layouts.index')

@section('page-title', 'Master Data Guru')

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
                        <li class="breadcrumb-item text-gray-700">Guru</li>
                    </ul>
                    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">Master Data Guru</h1>
                </div>
                <a href="{{ route('master.guru.create') }}" class="btn btn-sm btn-success ms-3 px-4 py-3">
                    <i data-feather="plus" class="h-20px me-2"></i>
                    Tambah Guru Baru
                </a>
            </div>
        </div>
    </div>
    <div id="kt_app_content" class="app-content flex-column-fluid">
        <div id="kt_app_content_container" class="app-container container-fluid">
            <div class="row gx-5 gx-xl-10">
                <div class="col-12">
                    <div class="card card-flush">
                        <div class="card-header pt-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label fw-bold text-dark">Daftar Guru</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">Daftar guru yang terdaftar</span>
                            </h3>
                        </div>
                        <div class="card-body pt-6">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>NIP</th>
                                            <th>Nama Guru</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Nomor HP</th>
                                            <th>Alamat</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @foreach ($data as $item)
                                        <tr class="align-middle">
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $item->nip }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                            <td>{{ $item->no_hp }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('master.guru.edit', $item->id) }}" class="btn btn-sm btn-primary mb-2 mb-md-0">
                                                    <i data-feather="edit" class="h-15px me-2"></i>
                                                    Edit
                                                </a>
                                                <form action="{{ route('master.guru.destroy', $item->id) }}" method="post" class="d-inline-block" onsubmit="return confirm('Hapus data guru ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-sm btn-danger">
                                                        <i data-feather="trash" class="h-15px me-2"></i>
                                                        Delete
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection