@extends('frontend.master2')
@section('frontpage')
    <div class="container">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif

        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Data Alumni</h2>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Foto</th>
                                <th>Nama</th>
                                <th>Asal Sekolah</th>
                                <th>Sertifikat</th>
                                <th>Status</th>
                                <th class="text-end">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($alumnis as $index => $alumni)
                                <tr>
                                    <td>{{ $alumnis->firstItem() + $index }}</td>
                                    <td>
                                        @if(!empty($alumni->foto) && file_exists(public_path('upload/alumni_images/' . $alumni->foto)))
                                            <img src="{{ asset('upload/alumni_images/' . $alumni->foto) }}" alt="Foto {{ $alumni->nama_siswa }}" style="width:42px;height:42px;object-fit:cover;border-radius:50%;">
                                        @else
                                            <img src="{{ asset('upload/noimage.jpg') }}" alt="No image" style="width:42px;height:42px;object-fit:cover;border-radius:50%;">
                                        @endif
                                    </td>
                                    <td>{{ $alumni->nama_siswa }}</td>
                                    <td>{{ $alumni->asal_sekolah ?? '-' }}</td>
                                    <td>{{ $alumni->sertifikat_keahlian ?? '-' }}</td>
                                    <td>{{ !empty($alumni->bekerja) ? 'Bekerja' : 'Belum' }}</td>
                                    <td class="text-end">
                                        <a href="{{ route('frontend.alumni.show', $alumni->id) }}" class="btn btn-sm btn-primary">Detail</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">Tidak ada alumni.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-3 d-flex justify-content-center">{{ $alumnis->links() }}</div>
            </div>
        </div>
    </div>
@endsection
