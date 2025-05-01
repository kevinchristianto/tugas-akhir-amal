@extends('layout.app')

@section('title', 'Kelola Chart of Account')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Master</li>
    <li class="breadcrumb-item active" aria-current="page">Chart of Account</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Chart of Account</h5>
                            <a href="{{ route('master.accounts.create') }}" class="btn btn-outline-primary d-flex gap-2">
                                <i class="bi bi-plus-lg"></i>
                                Akun Baru
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Kategori</th>
                                        <th>Kode Akun</th>
                                        <th>Nama Akun</th>
                                        <th>Deskripsi</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = $data->firstItem() @endphp
                                    @foreach($data as $akun)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ ucwords($akun->kategori) }}</td>
                                            <td>{{ $akun->kode_akun }}</td>
                                            <td>{{ $akun->nama_akun }}</td>
                                            <td>{{ $akun->deskripsi }}</td>
                                            <td class="d-flex gap-2 justify-content-center">
                                                <a href="{{ route('master.accounts.edit', $akun->id) }}" class="btn btn-outline-primary btn-sm">
                                                    <i class="bi bi-pencil"></i>
                                                </a>
                                                <form action="{{ route('master.accounts.destroy', $akun->id) }}" method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?');">
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
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection