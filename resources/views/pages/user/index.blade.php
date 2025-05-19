@extends('layout.app')

@section('title', 'Kelola User')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item" aria-current="page">Master</li>
    <li class="breadcrumb-item active" aria-current="page">User</li>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header py-3">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 class="card-title">Kelola User</h5>
                            <a href="{{ route('master.user.create') }}" class="btn btn-outline-primary d-flex gap-2 align-items-center">
                                <i class="ti ti-library-plus"></i>
                                User Baru
                            </a>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Username</th>
                                        <!-- <th>Level</th> -->
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php $no = 1 @endphp
                                    @foreach($data as $user)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->username }}</td>
                                            <!-- <td>{{ strlen($user->level) <= 3 ? strtoupper($user->level) : ucwords($user->level) }}</td> -->
                                            <td class="d-flex gap-2 justify-content-center">
                                                <a href="{{ route('master.user.edit', $user->id) }}" class="btn btn-light-primary btn-sm">
                                                    <i class="ti ti-edit"></i>
                                                </a>
                                                <form action="{{ route('master.user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah anda yakin ingin menghapus data ini?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-light-danger btn-sm">
                                                        <i class="ti ti-trash"></i>
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