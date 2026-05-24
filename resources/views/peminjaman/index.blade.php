@extends('layout.app')

@section('title','Alatku | Peminjaman')

@section('content')

    <h2 class="mt-2 mb-3">Peminjaman Inventaris</h2>
    <div class="d-flex flex-column flex-sm-row justify-content-between align-items-stretch align-items-sm-center mb-3">
        <a href="{{ route('peminjaman.create') }}" class="btn btn-success mb-1 mb-md-0">
            + Tambah
        </a>
        <form action="{{ route('peminjaman.index') }}" method="get" class="d-flex">
            <input type="search" name="search" value="{{ request('search') }}" class="form-control me-1" style="width: 200px" placeholder="Cari Peminjaman...">
            <button type="submit" class="btn btn-biru">
                <i class="bi bi-search"></i> Cari
            </button>
        </form>
    </div>
    <div class="table-responsive">
        <table class="table table-hover table-striped text-center align-middle">
            <thead>
                <th width="80">No</th>
                <th>User</th>
                <th>Nama Barang</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
                <th width="250">Aksi</th>
            </thead>
            <tbody>
                @forelse ($peminjamans as $index => $peminjaman)
                    <tr>
                        <td>{{ $peminjamans->firstItem() + $index }}</td>
                        <td class="fw-semibold">{{ $peminjaman->user->nama }}</td>
                        <td class="fw-semibold">{{ $peminjaman->barang->nama_barang }}</td>
                        <td class="fw-semibold">{{ $peminjaman->tanggal_pinjam }}</td>
                        <td class="fw-semibold">{{ $peminjaman->tanggal_kembali == '' ? '-' : $peminjaman->tanggal_kembali}}</td>
                        <td class="fw-semibold">
                            <span class="
                            @if ($peminjaman->status === 'kembali')
                                    badge bg-success
                                @else
                                    badge bg-danger
                                @endif">
                                {{ $peminjaman->status }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('peminjaman.show', $peminjaman->id) }}" class="btn btn-orange btn-sm mb-1 mb-md-0"><i class="bi bi-info-circle me-0 me-md-1"></i>Detail</a>
                            <a href="{{ route('peminjaman.edit', $peminjaman->id) }}" class="btn btn-warning btn-sm mb-1 mb-md-0"><i class="bi bi-pen me-0 me-md-1"></i> Edit</a>
                            <form action="{{ route('peminjaman.destroy', $peminjaman->id) }}" method="post" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm" onclick="confirm('Yakin ingin menghapus data?')"><i class="bi bi-trash me-0 me-md-1"></i>Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-muted">Tidak Ada Data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{ $peminjamans->links() }}
@endsection