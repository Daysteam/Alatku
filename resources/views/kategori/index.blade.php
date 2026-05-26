@extends('layout.app')

@section('title','Alatku | Kategori')

@section('content')

    <h2 class="mt-2 mb-3 text-sm-center">Kategori Inventaris</h2>
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-stretch align-items-sm-center mb-3">
        <a href="{{ route('kategori.create') }}" class="btn btn-success mb-1 mb-md-0">
            + Tambah
        </a>
        <form action="{{ route('kategori.index') }}" method="get" class="d-flex">
            <input type="search" name="search" placeholder="Cari kategori..." class="form-control me-2" style="width: 200px;" value="{{ request('search') }}">
            <button type="submit" class="btn btn-biru">
                <i class="bi bi-search"></i> Cari
            </button>
        </form>

    </div>

    <div class="table-responsive">
        <table class="table table-hover table-striped text-center align-middle">
            <thead>
                <tr>
                    <th>No</th>
                    <th width="500">Nama Kategori</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($kategoris as $index => $kategori)
                    <tr>
                        <td>{{ $kategoris->firstItem() + $index }}</td>
                        <td class="fw-semibold">{{ $kategori->nama_kategori }}</td>
                        <td>
                            <a href="{{ route('kategori.edit', $kategori->id) }}" class="btn btn-warning btn-sm mb-1 mb-md-0"><i class="bi bi-pencil me-1"></i>Edit</a>
                            <form action="{{ route('kategori.destroy', $kategori->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')"><i class="bi bi-trash me-1"></i>Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="3" class="py-4 text-muted">Tidak ada data kategori</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="my-2">
        {{ $kategoris->links() }}
    </div>
@endsection