@extends('layout.app')

@section('title','Alatku | Edit Kategori Inventaris')

@section('content')
    <div class="w-50 mx-auto">
        <h2 class="mt-2 mb-3 text-sm-start text-md-center">Edit Kategori Inventaris</h2>
        <a href="{{ route('kategori.index') }}" class="btn btn-secondary mb-3">Kembali</a>
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('kategori.update', $kategori->id) }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="nama_kategori" class="form-label">Nama Kategori</label>
                        <input type="text" class="form-control" name="nama_kategori" id="nama_kategori" placeholder="Nama Kategori.." value="{{ old('nama_kategori', $kategori->nama_kategori) }}">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button class="btn btn-biru">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection