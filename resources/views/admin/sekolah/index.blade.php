@extends('admin.adminmaster')
@section('admin')
    <div class="row">

        <div class="container">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h1>Data Sekolah</h1>
                <a href="{{ route('sekolah.create') }}" class="btn btn-success">Tambah Sekolah</a>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NPSN</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>Kota</th>
                        <th>Provinsi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($sekolahs as $index => $sekolah)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $sekolah->npsn }}</td>
                            <td>{{ $sekolah->nama }}</td>
                            <td>{{ $sekolah->alamat }}</td>
                            <td>{{ $sekolah->kota }}</td>
                            <td>{{ $sekolah->provinsi }}</td>
                            <td>
                                <a href="{{ route('sekolah.edit', $sekolah->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('sekolah.destroy', $sekolah->id) }}" method="POST"
                                    style="display:inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Yakin ingin menghapus data ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
@endsection
