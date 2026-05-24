@extends('layout.app')

@section('title','Alatku | Edit Lokasi Inventaris')

@section('content')
    <div class="w-50 mx-auto">
        <h2 class="mt-2 mb-3 text-center">Edit Lokasi Inventaris</h2>
        <a class="btn btn-secondary mb-3" href="{{ route('lokasi.index') }}">Kembali</a>
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('lokasi.update', $lokasi->id) }}" method="post" class="shadow-sm">
                    @csrf
                        @method('PUT')
                    <div class="mb-3">
                        <label for="nama_lokasi" class="form-label">Nama Lokasi</label>
                        <input type="text" name="nama_lokasi" id="nama_lokasi" value="{{ old('nama_lokasi', $lokasi->nama_lokasi) }}" class="form-control" placeholder="lokasi..">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-biru">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection