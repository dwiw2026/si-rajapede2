@extends('frontend.master2')
@section('frontpage')
    <div class="container py-4">
        <h2 class="mb-4">Daftar Peserta Didik</h2>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Asal Sekolah</th>
                                <th>Sudah Magang</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($pesertas as $index => $peserta)
                                <tr>
                                    <td>{{ $pesertas->firstItem() + $index }}</td>
                                    <td>
                                        @if(!empty($peserta->foto) && file_exists(public_path('upload/peserta_images/' . $peserta->foto)))
                                            <img src="{{ asset('upload/peserta_images/' . $peserta->foto) }}" alt="Foto {{ $peserta->nama_siswa }}" style="width:42px;height:42px;object-fit:cover;border-radius:50%;">
                                        @else
                                            <img src="{{ asset('upload/noimage.jpg') }}" alt="No image" style="width:42px;height:42px;object-fit:cover;border-radius:50%;">
                                        @endif
                                    </td>
                                    <td>{{ $peserta->nama_siswa }}</td>
                                    <td>{{ $peserta->kelas ?? '-' }}</td>
                                    <td>{{ $peserta->asal_sekolah ?? '-' }}</td>
                                    <td>{{ $peserta->sudah_magang ? 'Ya' : 'Tidak' }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('frontend.pesertadidik.show', $peserta->id) }}" class="btn btn-sm btn-primary">Detail</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada peserta didik.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3 d-flex justify-content-center">{{ $pesertas->links() }}</div>
            </div>
        </div>
    </div>
@endsection
