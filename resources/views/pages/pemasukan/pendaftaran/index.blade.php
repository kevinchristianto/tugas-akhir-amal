@extends('layouts.index')

@section('page-title', 'Pendaftaran Peserta Didik Baru')

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
                        <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Pemasukan</li>
                        <li class="breadcrumb-item">
                            <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
                        </li>
                        <li class="breadcrumb-item text-gray-700">Pendaftaran Peserta Didik Baru</li>
                    </ul>
                    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">Pendaftaran Peserta Didik Baru</h1>
                </div>
                <a href="#" class="btn btn-sm btn-success ms-3 px-4 py-3" data-bs-toggle="modal" data-bs-target="#modal-add-pendaftaran">
                    <i data-feather="plus" class="h-20px me-2"></i>
                    Pendaftaran Baru
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
                                <span class="card-label fw-bold text-dark">History Pendaftaran Peserta Didik Baru</span>
                                <span class="text-gray-400 mt-1 fw-semibold fs-6">History pendaftaran peserta didik baru</span>
                            </h3>
                        </div>
                        <div class="card-body pt-6">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nominal</th>
                                            <th>NIS</th>
                                            <th>Nama Siswa</th>
                                            <th>Nama Wali</th>
                                            <th>Jenis Kelamin</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php $no = 1; @endphp
                                        @foreach ($data as $item)
                                        <tr class="align-middle">
                                            <td>{{ $no++ }}</td>
                                            <td>
                                                <span class="badge rounded-pill bg-success text-white">Rp{{ number_format($item->detail_transaksi->nominal) }}</span>
                                            </td>
                                            <td>{{ $item->detail_siswa->nis }}</td>
                                            <td>{{ $item->detail_siswa->nama }}</td>
                                            <td>{{ $item->detail_siswa->nama_wali }}</td>
                                            <td>{{ $item->detail_siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                            <td class="text-center">
                                                <form action="{{ route('pemasukan.pendaftaran.destroy', $item->id) }}" method="post" class="d-inline-block" onsubmit="return confirm('Hapus data ini?')">
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

@section('modal-section')
<div class="modal fade" id="modal-add-pendaftaran">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Tambah Pendaftaran Peserta Didik Baru</h5>
                <button class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('pemasukan.pendaftaran.store') }}" method="post">
                    @csrf
                    <div class="mb-4">
                        <label class="required fs-5 fw-semibold mb-2">Tanggal Pembayaran</label>
                        <input type="date" class="form-control form-control-solid" name="tanggal_bayar" required>
                    </div>
                    <div class="mb-4">
                        <label class="required fs-5 fw-semibold mb-2">Nominal Pembayaran</label>
                        <input type="number" class="form-control form-control-solid" name="nominal" required value="500000">
                    </div>
                    <div class="mb-4">
                        <label class="required fs-5 fw-semibold mb-2">NIS</label>
                        <input type="text" class="form-control form-control-solid" name="nis" required>
                    </div>
                    <div class="mb-4">
                        <label class="required fs-5 fw-semibold mb-2">Nama Siswa</label>
                        <input type="text" class="form-control form-control-solid" name="nama" required>
                    </div>
                    <div class="mb-4">
                        <label class="required fs-5 fw-semibold mb-2">Nama Wali</label>
                        <input type="text" class="form-control form-control-solid" name="nama_wali" required>
                    </div>
                    <div class="mb-4">
                        <label class="required fs-5 fw-semibold mb-2">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control form-control-solid" required>
                            <option value selected disabled>--- Pilih Jenis Kelamin ---</option>
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="required fs-5 fw-semibold mb-2">Tanggal Lahir</label>
                        <input type="date" class="form-control form-control-solid" name="tanggal_lahir" required>
                    </div>
                    <div class="mb-4">
                        <label class="required fs-5 fw-semibold mb-2">Alamat</label>
                        <textarea name="alamat" class="form-control form-control-solid" required></textarea>
                    </div>

                    <div class="separator mb-8"></div>
                    
                    <div class="d-flex justify-content-end">
                        <a href="#" class="btn btn-secondary me-2" data-bs-dismiss="modal">
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
@endsection