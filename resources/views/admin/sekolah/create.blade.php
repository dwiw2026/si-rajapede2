@extends('admin.adminmaster')
@section('admin')
    <div class="container">
        <h1>Tambah Sekolah</h1>
        <form action="{{ route('sekolah.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="npsn" class="form-label">NPSN</label>
                <input type="text" name="npsn" class="form-control" value="{{ old('npsn') }}">
            </div>
            <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="nama" class="form-control" value="{{ old('nama') }}">
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control">{{ old('alamat') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="kota" class="form-label">Kota</label>
                <input type="text" name="kota" class="form-control" value="{{ old('kota') }}">
            </div>
            <div class="mb-3">
                <label for="provinsi" class="form-label">Provinsi</label>
                <input type="text" name="provinsi" class="form-control" value="{{ old('provinsi') }}">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a href="{{ route('sekolah.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>
@endsection
