@extends('admin.adminmaster')
@section('admin')
    <div class="container">
        <h1>Tambah Perusahaan</h1>
        <form action="{{ route('perusahaan.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control">{{ old('alamat') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="text" name="telepon" class="form-control" value="{{ old('telepon') }}">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" name="email" class="form-control" value="{{ old('email') }}">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('perusahaan.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
