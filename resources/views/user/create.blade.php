@extends('layout.app')

@section('title','Alatku | Tambah User Inventaris')

@section('content')
    <div class="w-50 mx-auto">
        <h2 class="mt-2 mb-3 text-sm-start text-md-center">Tambah User Inventaris</h2>
        <a class="btn btn-secondary mb-3" href="{{ route('user.index') }}">Kembali</a>
        <div class="card shadow-sm">
            <div class="card-body">
                <form action="{{ route('user.store') }}" method="post" class="shadow-sm">
                    @csrf
                    <div class="mb-3">
                        <label for="nama_user" class="form-label">Nama User</label>
                        <input type="text" name="nama" id="nama_user" value="{{ old('nama') }}" class="form-control" placeholder="nama user..">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" name="email" id="email" value="{{ old('email') }}" class="form-control" placeholder="email..">
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-biru">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection