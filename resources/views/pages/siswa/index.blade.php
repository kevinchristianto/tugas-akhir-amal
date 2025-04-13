@extends('layout.app')

@section('title', 'Kelola Data Siswa')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Master</li>
    <li class="breadcrumb-item active" aria-current="page">Siswa</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Kelola Data Siswa</h5>
                            <a href="{{ route('master.siswa.create') }}" class="btn btn-outline-primary btn-sm d-flex gap-2 align-items-center">
                                <i class="bi bi-plus-lg"></i>
                                Siswa Baru
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered-table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIS</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat & Tgl Lahir</th>
                                        <th>No HP</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1 @endphp
                                    @foreach($data as $siswa)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $siswa->nis }}</td>
                                            <td>{{ $siswa->nama_lengkap }}</td>
                                            <td>{{ $siswa->jenis_kelamin }}</td>
                                            <td>{{ $siswa->tempat_lahir . ', ' . $siswa->tanggal_lahir }}</td>
                                            <td>{{ $siswa->no_hp }}</td>
                                            <td>{{ $siswa->email }}</td>
                                            <td>{{ $siswa->alamat }}</td>
                                            <td class="d-flex gap-2 justify-content-center">
                                                <a href="#" class="btn btn-outline-primary btn-sm">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="{{ route('master.siswa.destroy', $siswa->id) }}" method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm">
                                                        <i class="bi bi-trash"></i>
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