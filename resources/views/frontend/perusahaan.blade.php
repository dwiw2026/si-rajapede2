@extends('frontend.master2')
@section('frontpage')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Daftar Perusahaan / Instansi</h2>
            <form class="d-flex" method="get" action="{{ route('frontend.perusahaan') }}">
                <input name="q" class="form-control form-control-sm me-2" type="search" placeholder="Cari nama..."
                    value="{{ request('q') }}">
                <button class="btn btn-sm btn-outline-primary" type="submit">Cari</button>
            </form>
        </div>

        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead class="table-light">
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Telepon</th>
                        <th scope="col">Email</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($perusahaans as $perusahaan)
                        <tr>
                            <td>{{ $perusahaan->id }}</td>
                            <td>{{ $perusahaan->nama }}</td>
                            <td>{{ $perusahaan->alamat }}</td>
                            <td>{{ $perusahaan->telepon }}</td>
                            <td>{{ $perusahaan->email }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center">Tidak ada data perusahaan.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-3">
            {{ $perusahaans->links() }}
        </div>
    </div>
@endsection
