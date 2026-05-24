@extends('layout.app')

@section('title','Alatku | Barang')

@section('content')

    <h2 class="mt-2 mb-3 text-sm-center">Barang Inventaris</h2>
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-stretch align-items-sm-center mb-3">
        <a href="{{ route('barang.create') }}" class="btn btn-success mb-1 mb-md-0">
            + Tambah
        </a>
        <form action="{{ route('barang.index') }}" method="get" class="d-flex">
            <input type="search" name="search" placeholder="Cari barang..." class="form-control me-2" style="width: 200px;" value="{{ request('search') }}">
            <button type="submit" class="btn btn-biru">
                <i class="bi bi-search"></i> Cari
            </button>
        </form>

    </div>

    <div class="table-responsive">
        <table class="table table-hover table-striped text-center align-middle">
            <thead>
                <tr>
                    <th width="80">No</th>
                    <th>Nama Barang</th>
                    <th>Kategori</th>
                    <th>Lokasi</th>
                    <th>Kode</th>
                    <th>Jumlah</th>
                    <th>Kondisi</th>
                    <th width="200">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($barangs as $index => $barang)
                    <tr>
                        <td>{{ $barangs->firstItem() + $index }}</td>
                        <td class="fw-semibold">{{ $barang->nama_barang }}</td>
                        <td class="fw-semibold">{{ $barang->kategori->nama_kategori }}</td>
                        <td class="fw-semibold">{{ $barang->lokasi->nama_lokasi }}</td>
                        <td class="fw-semibold">{{ $barang->kode_barang }}</td>
                        <td class="fw-semibold">{{ $barang->jumlah }}</td>
                        <td class="fw-semibold">{{ $barang->kondisi }}</td>
                        <td>
                            <a href="{{ route('barang.edit', $barang->id) }}" class="btn btn-warning btn-sm mb-1 mb-md-0"><i class="bi bi-pencil me-1"></i>Edit</a>
                            <form action="{{ route('barang.destroy', $barang->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin hapus data ini?')"><i class="bi bi-trash me-1"></i>Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="py-4 text-muted">Tidak ada data kategori</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    <div class="my-2">
        {{ $barangs->links() }}
    </div>
@endsection