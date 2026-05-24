@extends('layout.app')

@section('title','Alatku | Tambah Lokasi Inventaris')

@section('content')
    <div class="w-50 mx-auto">
        <h2 class="mt-2 mb-3 text-sm-start text-md-middle">Tambah Lokasi Inventaris</h2>
        <a class="btn btn-secondary mb-3" href="{{ route('lokasi.index') }}">Kembali</a>
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('lokasi.store') }}" method="post" class="shadow-sm">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_lokasi" class="form-label">Nama Lokasi</label>
                        <input type="text" name="nama_lokasi" id="nama_lokasi" value="{{ old('nama_lokasi') }}" class="form-control" placeholder="lokasi..">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-biru">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection