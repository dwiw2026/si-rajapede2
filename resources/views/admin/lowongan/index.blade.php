@extends('admin.adminmaster')
@section('admin')
    <div class="row">
        <div class="col-lg-12">
            <h1>Data Lowongan</h1>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            <form method="GET" class="mb-3 card p-3">
                <div class="row">
                    <div class="col-md-4">
                        <input type="text" name="search" class="form-control" placeholder="Cari judul atau deskripsi..."
                            value="{{ $search }}">
                    </div>
                    <div class="col-md-4">
                        <select name="perusahaan_id" class="form-select">
                            <option value="">-- Semua Perusahaan --</option>
                            @foreach ($perusahaans as $p)
                                <option value="{{ $p->id }}" {{ $filterPerusahaan == $p->id ? 'selected' : '' }}>
                                    {{ $p->nama }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-primary w-100">Filter/Cari</button>
                    </div>
                </div>
            </form>

            <a href="{{ route('lowongan.create') }}" class="btn btn-success mb-3">+ Tambah Lowongan</a>

            <div class="table-responsive">
                <table class="table table-bordered table-hover small">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Judul</th>
                            <th>Perusahaan</th>
                            <th>Posting</th>
                            <th>Berakhir</th>
                            <th>Kategori</th>
                            <th>Gaji</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($lowongans as $index => $l)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td><strong>{{ $l->judul }}</strong></td>
                                <td>{{ $l->perusahaan->nama }}</td>
                                <td>{{ $l->tanggal_posting ? \Carbon\Carbon::parse($l->tanggal_posting)->format('d M Y') : '-' }}
                                </td>
                                <td>{{ \Carbon\Carbon::parse($l->tanggal_berakhir)->format('d M Y') }}</td>
                                <td>{{ $l->kategori_pekerjaan ?? '-' }}</td>
                                <td>{{ $l->gaji_min ?? '-' }}</td>
                                <td>
                                    <a href="{{ route('lowongan.edit', $l->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <form action="{{ route('lowongan.destroy', $l->id) }}" method="POST"
                                        style="display:inline">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Yakin ingin menghapus data ini?')">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted py-4">Tidak ada data lowongan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
