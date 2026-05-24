@extends('layout.app')

@section('title','Alatku | Tambah Barang Inventaris')

@section('content')
    <div class="w-50 mx-auto">
        <h2 class="mt-2 mb-3 text-start text-md-center">Tambah Barang Inventaris</h2>
        <a href="{{ route('barang.index') }}" class="btn btn-secondary mb-3">Kembali</a>
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('barang.store') }}" method="post">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_barang" class="form-label">Nama Barang</label>
                        <input type="text" class="form-control" name="nama_barang" id="nama_barang" placeholder="Nama Barang.." value="{{ old('nama_barang') }}">
                    </div>
                    <div class="mb-3">
                        <label for="kode_barang" class="form-label">kode Barang</label>
                        <input type="text" class="form-control" name="kode_barang" id="kode_barang" placeholder="Kode Barang.." value="{{ old('kode_barang') }}">
                    </div>
                    <div class="mb-3">
                        <label for="jumlah" class="form-label">Jumlah</label>
                        <input type="number" class="form-control" name="jumlah" id="jumlah" placeholder="0" value="{{ old('jumlah') }}">
                    </div>
                    <div class="mb-3">
                        <label for="kategori_id" class="form-label">Kategori</label>
                        <select name="kategori_id" id="kategori_id" class="form-select">
                            <option class="form-select" value="">-- Pilih kategori --</option>
                            @forelse ($kategoris as $kategori)
                                <option  value="{{ $kategori->id }}" {{ old('kategori_id') == $kategori->id ? 'selected' : '' }}>{{ $kategori->nama_kategori }}</option>
                            @empty
                                <option >Tidak ada data</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="lokasi_id" class="form-label">Lokasi</label>
                        <select name="lokasi_id" id="lokasi_id" class="form-select">
                            <option class="form-select" value="">-- Pilih lokasi --</option>
                            @forelse ($lokasis as $lokasi)
                                <option  value="{{ $lokasi->id }}" {{ old('lokasi_id') == $lokasi->id ? 'selected' : '' }}>{{ $lokasi->nama_lokasi }}</option>
                            @empty
                                <option>Tidak ada data</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="kondisi" class="form-label">Kondisi</label>
                        <select class="form-select" name="kondisi" id="kondisi">
                            <option  value="">-- Pilih kondisi --</option>
                            <option  value="baik" {{ old('kondisi') === 'baik' ? 'selected' : '' }}>Baik</option>
                            <option  value="rusak" {{ old('kondisi') === 'rusak' ? 'selected' : '' }}>Rusak</option>
                            <option  value="perbaikan {{ old('kondisi') === 'perbaikan' ? 'selected' : '' }}">Perbaikan</option>
                        </select>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-biru">Simpan</button>
                    </div>
                </form>
            </div>
            </div>
    </div>
@endsection