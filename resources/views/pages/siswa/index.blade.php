@extends('layout.app')

@section('title', 'Kelola Data Siswa')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Master Data</a></li>
    <li class="breadcrumb-item" aria-current="page">Murid & Wali Murid</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Kelola Data Siswa</h5>
                            <a href="{{ route('master.siswa.create') }}" class="btn btn-outline-primary d-flex gap-2 align-items-center">
                                <i class="ti ti-library-plus"></i>
                                Siswa Baru
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Tahun Ajaran</th>
                                        <th>NIS</th>
                                        <th>Nama Lengkap</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tempat & Tgl Lahir</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Nama Wali</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1 @endphp
                                    @foreach($data as $siswa)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $siswa->tahun_ajaran }}</td>
                                            <td>{{ $siswa->nis }}</td>
                                            <td>{{ $siswa->nama_lengkap }}</td>
                                            <td>{{ $siswa->jenis_kelamin == 'L' ? 'Laki-laki' : 'Perempuan' }}</td>
                                            <td>{{ $siswa->tempat_lahir . ', ' . $siswa->tanggal_lahir }}</td>
                                            <td>{{ $siswa->email }}</td>
                                            <td>{{ $siswa->alamat }}</td>
                                            <td>{{ $siswa->waliMurid->nama_ayah ?? '' }} - {{ $siswa->waliMurid->nama_ibu ?? '' }}</td>
                                            <td class="d-flex gap-2 justify-content-center">
                                                <button class="btn btn-outline-info btn-sm" onclick="return getWaliMurid({{ $siswa->id }})" data-bs-toggle="tooltip" data-bs-title="Kelola Wali Murid" data-bs-placement="top" title="Kelola Data Wali Murid">
                                                    <i class="ti ti-users"></i>
                                                </button>
                                                <a href="{{ route('master.siswa.edit', $siswa->id) }}" class="btn btn-outline-primary btn-sm" data-bs-toggle="tooltip" data-bs-title="Edit Data Siswa" data-bs-placement="top" title="Edit Data Siswa">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                                <form action="{{ route('master.siswa.destroy', $siswa->id) }}" method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-outline-danger btn-sm" data-bs-toggle="tooltip" data-bs-title="Hapus Data Siswa" data-bs-placement="top" title="Hapus Data Siswa">
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

@section('modal-section')
    <div class="modal fade" id="manage-parent">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Kelola Data Wali Murid</h5>
                    <button class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="#" method="post" id="form-wali-murid">
                        @csrf
                        @method('patch')
                        <input type="hidden" name="siswa_id" id="siswa-id">
                        <div class="mb-3">
                            <label for="nama-ayah" class="form-label">Nama Ayah</label>
                            <input type="text" class="form-control" id="nama-ayah" name="nama_ayah" placeholder="Masukkan nama ayah">
                        </div>
                        <div class="mb-3">
                            <label for="nama-ibu" class="form-label">Nama Ibu</label>
                            <input type="text" class="form-control" id="nama-ibu" name="nama_ibu" placeholder="Masukkan nama ibu">
                        </div>
                        <div class="mb-3">
                            <label for="no-hp" class="form-label">No HP</label>
                            <input type="text" class="form-control" id="no-hp" name="no_hp" placeholder="Masukkan No HP wali murid" required>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email wali murid" required>
                        </div>
                        <div class="mb-3 d-flex justify-content-between">
                            <a href="#" class="btn btn-outline-secondary d-flex gap-2 align-items-center" data-bs-dismiss="modal">
                                <i class="bi bi-x-lg"></i>
                                Batal
                            </a>
                            <button class="btn btn-outline-success d-flex gap-2 align-items-center">
                                <i class="ti ti-device-floppy"></i>
                                Simpan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('custom-script')
    <script>
        const getWaliMurid = siswaId => {
            let url = `{{ route('master.wali_murid.show', ':id') }}`
            url = url.replace(':id', siswaId)

            $.get(url, data => {
                $('#siswa-id').val(siswaId)
                if (!data.isEmpty) {
                    url = `{{ route('master.wali_murid.update', ':id') }}`
                    url = url.replace(':id', data.data.siswa_id)

                    $('#nama-ayah').val('').val(data.data.nama_ayah)
                    $('#nama-ibu').val('').val(data.data.nama_ibu)
                    $('#no-hp').val(data.data.no_hp)
                    $('#email').val(data.data.email)
                    $('#form-wali-murid input[name="_method"]').val('PATCH')
                    $('#form-wali-murid').attr('action', url)
                } else {
                    url = `{{ route('master.wali_murid.store') }}`
                    
                    $('#nama-ayah').val('')
                    $('#nama-ibu').val('')
                    $('#no-hp').val('')
                    $('#email').val('')
                    $('#form-wali-murid input[name="_method"]').val('POST')
                    $('#form-wali-murid').attr('action', url)
                }
                $('#manage-parent').modal('show')
            })
        }
    </script>
@endsection