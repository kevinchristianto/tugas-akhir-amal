@extends('layout.app')

@section('title', 'Kelola Data Guru')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Master</li>
    <li class="breadcrumb-item active" aria-current="page">Guru</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Kelola Data Guru</h5>
                            <a href="{{ route('master.guru.create') }}" class="btn btn-outline-primary d-flex gap-2 align-items-center">
                                <i class="ti ti-library-plus"></i>
                                Guru Baru
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIP</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jenis Kelamin</th>
                                        <th>No HP</th>
                                        <th>Alamat</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1 @endphp
                                    @foreach($data as $guru)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $guru->nip }}</td>
                                            <td>{{ $guru->nama_lengkap }}</td>
                                            <td>{{ $guru->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                            <td>{{ $guru->no_hp }}</td>
                                            <td>{{ $guru->alamat }}</td>
                                            <td class="d-flex gap-2 justify-content-center">
                                                <a href="{{ route('master.guru.edit', $guru->id) }}" class="btn btn-outline-primary btn-sm">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                                <form action="{{ route('master.guru.destroy', $guru->id) }}" method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                                        <i class="ti ti-trash"></i>
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
@endsection