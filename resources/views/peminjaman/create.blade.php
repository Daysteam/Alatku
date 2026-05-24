@extends('layout.app')

@section('title','Alatku | Tambah Peminjaman Inventaris')

@section('content')
    <div class="w-50 mx-auto">
        <h2 class="mt-2 mb-3 text-start text-md-center">Tambah Peminjaman Inventaris</h2>
        <a href="{{ route('peminjaman.index') }}" class="btn btn-secondary mb-3">Kembali</a>
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('peminjaman.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="barang_id" class="form-label">Barang</label>
                        <select name="barang_id" id="barang_id" class="form-select">
                            <option class="form-select" value="">-- Pilih Barang --</option>
                            @forelse ($barangs as $barang)
                                <option class="form-select" value="{{ $barang->id }}" {{ old('barang_id') == $barang->id ? 'selected' : '' }}>{{ $barang->nama_barang }}</option>
                            @empty
                                <option class="form-select" >Tidak ada data</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="user_id" class="form-label">User</label>
                        <select name="user_id" id="user_id" class="form-select">
                            <option class="form-select" value="">-- Pilih User --</option>
                            @forelse ($users as $user)
                                <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>{{ $user->nama }}</option>
                            @empty
                                <option  >Tidak ada data</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_pinjam" class="form-label">Tanggal Pinjam</label>
                        <input type="date" class="form-control" name="tanggal_pinjam" id="tanggal_pinjam" placeholder="0000-00-00" value="{{ old('tanggal_pinjam') }}">
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_kembali" class="form-label">Tanggal Kembali</label>
                        <input type="date" class="form-control" name="tanggal_kembali" id="tanggal_kembali" placeholder="0000-00-00" value="{{ old('tanggal_kembali') }}">
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="0" value="{{ old('jumlah') }}">
                    </div>
                    <div class="mb-3">
                        <label for="status" class="form-label">Status</label>
                        <select class="form-select" name="status" id="status">
                            <option value="">-- Pilih kondisi --</option>
                            <option  value="kembali" {{ old('status') === 'kembali' ? 'selected' : '' }}>Kembali</option>
                            <option  value="pinjam" {{ old('status') === 'pinjam' ? 'selected' : '' }}>Pinjam</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alasan" class="form-label">Alasan</label>
                        <textarea name="alasan" id="alasan"  placeholder="Alasan.." value="{{ old('alasan') }}" class="form-control"></textarea>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-biru">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection