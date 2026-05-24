@extends('layout.app')

@section('title','Alatku | User')

@section('content')
    <h2 class="mt-2 mb-3 text-sm-center">User Inventaris</h2>
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-stretch align-items-sm-center mb-3">
        <a class="btn btn-success mb-1 mb-md-0" href="{{ route('user.create') }}">+ Tambah</a>
        <form action="{{ route('user.index') }}" method="get" class="d-flex">
            @csrf
            <input type="search" name="search" class="form-control me-1" value="{{ request('search') }}" placeholder="Cari user.." style="width: 200px">
            <button class="btn btn-biru"><i class="bi bi-search me-1"></i>Cari</button>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-striped text-center align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama User</th>
                    <th>Email</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($users as $index => $user)
                    <tr>
                        <td>{{ $users->firstItem() + $index }}</td>
                        <td class="fw-semibold">{{ $user->nama }}</td>
                        <td class="fw-semibold">{{ $user->email }}</td>
                        <td>
                            <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm mb-1 mb-md-0"><i class="bi bi-pen me-1"></i>Edit</a>
                            <form action="{{ route('user.destroy', $user->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="confirm('Yakin ingin menghapus data?')"><i class="bi bi-trash me-1"></i>Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-muted">Tidak ada Data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $users->links() }}
@endsection