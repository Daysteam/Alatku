@extends('layout.app')

@section('title','Alatku | Lokasi')

@section('content')

    <h2 class="mt-2 mb-3 text-sm-center">Lokasi Inventaris</h2>
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-stretch align-items-sm-center mb-3">
        <a href="{{ route('lokasi.create') }}" class="btn btn-success mb-1 mb-md-0">
            + Tambah
        </a>
        <form action="{{ route('lokasi.index') }}" method="get" class="d-flex">
            <input type="search" name="search" value="{{ request('search') }}" class="form-control me-1" style="width: 200px" placeholder="Cari lokasi...">
            <button type="submit" class="btn btn-biru">
                <i class="bi bi-search"></i> Cari
            </button>
        </form>
    </div>
    <table class="table table-hover table-striped text-center align-middle">
        <thead>
            <th>No</th>
            <th width="500">Nama Lokasi</th>
            <th>Aksi</th>
        </thead>
        <tbody>
            @forelse ($lokasis as $index => $lokasi)
                <tr>
                    <td>{{ $lokasis->firstItem() + $index }}</td>
                    <td class="fw-semibold">{{ $lokasi->nama_lokasi }}</td>
                    <td>
                        <a href="{{ route('lokasi.edit', $lokasi->id) }}" class="btn btn-warning btn-sm mb-1  mb-md-0"><i class="bi bi-pen me-1"></i>Edit</a>
                        <form action="{{ route('lokasi.destroy', $lokasi->id) }}" method="post" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm" onclick="confirm('Yakin ingin menghapus data?')"><i class="bi bi-trash me-1"></i>Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-muted">Tidak Ada Data</td>
                </tr>
            @endforelse
        </tbody>
    </table>
    {{ $lokasis->links() }}
@endsection