@extends('layout.app')

@section('title', 'Kelola Akun Keuangan')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Master</li>
    <li class="breadcrumb-item active" aria-current="page">Akun Keuangan</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Akun Keuangan</h5>
                            <a href="{{ route('master.account.create') }}" class="btn btn-outline-primary d-flex gap-2 align-items-center">
                                <i class="ti ti-library-plus"></i>
                                Akun Baru
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover" style="table-layout: auto; width: 100%;">
                                <thead>
                                    <tr>
                                        <th class="text-center" style="white-space: nowrap; width: 1%;">Aksi</th>
                                        <th class="text-center">No</th>
                                        <th>Kategori</th>
                                        <th>Kode Akun</th>
                                        <th>Nama Akun</th>
                                        <th>Deskripsi</th>
                                        <th class="text-end">Saldo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = $data->firstItem() @endphp
                                    @foreach($data as $akun)
                                        <tr class="py-0">
                                            <td class="d-flex gap-2 justify-content-center">
                                                <a href="{{ route('master.account.edit', $akun->id) }}" class="btn btn-light-primary btn-sm">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                                <form action="{{ route('master.account.destroy', $akun->id) }}" method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-light-danger btn-sm">
                                                        <i class="ti ti-trash"></i>
                                                    </button>
                                                </form>
                                            </td>
                                            <td class="text-center">{{ $no++ }}</td>
                                            <td>
                                                <div class="badge text-bg-{{ $akun->saldo_normal == 'debit' ? 'success' : 'danger' }} rounded-1">
                                                    {{ ucwords($akun->kategori) }}
                                                </div>
                                            </td>
                                            <td>{{ $akun->kode_akun }}</td>
                                            <td>{{ $akun->nama_akun }}</td>
                                            <td>{{ $akun->deskripsi }}</td>
                                            <td class="text-end">
                                                <h5>Rp{{ number_format($akun->saldo_optimized) }}</h5>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="d-flex flex-column gap-1">
                            <h6 class="mb-0">Saldo Normal Kategori</h6>
                            <div class="d-flex gap-2 align-items-center">
                                <div class="bg-success rounded-1" style="width: 15px; height: 15px;">&nbsp;</div>
                                <small>Debit</small>
                            </div>
                            <div class="d-flex gap-2 align-items-center">
                                <div class="bg-danger rounded-1" style="width: 15px; height: 15px;">&nbsp;</div>
                                <small>Kredit</small>
                            </div>
                        </div>
                        {{ $data->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection