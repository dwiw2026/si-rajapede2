@extends('frontend.master2')
@section('frontpage')
    <div class="container my-4">
        <div class="row">
            <div class="col-md-8">
                <h1 class="mb-3">{{ $lowongan->judul }}</h1>
                <p class="text-muted"><strong>Perusahaan:</strong> {{ optional($lowongan->perusahaan)->nama }}</p>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <p><strong>Lokasi:</strong> {{ $lowongan->lokasi ?? '-' }}</p>
                        <p><strong>Tanggal Posting:</strong>
                            {{ $lowongan->tanggal_posting ? \Carbon\Carbon::parse($lowongan->tanggal_posting)->format('d-m-Y') : '-' }}
                        </p>
                        <p><strong>Tanggal Berakhir:</strong>
                            {{ $lowongan->tanggal_berakhir ? \Carbon\Carbon::parse($lowongan->tanggal_berakhir)->format('d-m-Y') : '-' }}
                        </p>
                    </div>
                    <div class="col-md-6">
                        <p><strong>Rentang Gaji:</strong>
                            @if ($lowongan->gaji_min || $lowongan->gaji_max)
                                {{ $lowongan->gaji_min ?? 'Tidak diketahui' }} -
                                {{ $lowongan->gaji_max ?? 'Tidak diketahui' }}
                            @else
                                Tidak diketahui
                            @endif
                        </p>
                        <p><strong>Kategori Pekerjaan:</strong> {{ $lowongan->kategori_pekerjaan ?? '-' }}</p>
                        <p><strong>Jenis Pekerjaan:</strong> {{ $lowongan->jenis_pekerjaan ?? '-' }}</p>
                    </div>
                </div>

                <div class="mb-4">
                    <h4>Jenis Kelamin</h4>
                    <p>{{ $lowongan->jenis_kelamin ?? '-' }}</p>
                </div>

                <div class="mb-4">
                    <h4>Deskripsi Pekerjaan</h4>
                    <p>{{ nl2br(e($lowongan->deskripsi)) }}</p>
                </div>

                <div class="mb-4">
                    <h4>Kriteria Kualifikasi</h4>
                    <p>{{ nl2br(e($lowongan->kriteria_kualifikasi ?? '-')) }}</p>
                </div>

                @if ($lowongan->jenis_disabilitas)
                    <div class="mb-4">
                        <h4>Jenis Disabilitas</h4>
                        <p>{{ $lowongan->jenis_disabilitas ?? '-' }}</p>
                    </div>
                @endif

                <div class="mt-4">
                    <a href="{{ route('frontend.lowongan') }}" class="btn btn-secondary">
                        <i class="bi bi-arrow-left"></i> Kembali ke Daftar Lowongan
                    </a>
                </div>
            </div>
            <div class="col-md-4">
                @if ($lowongan->gambar)
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ asset('storage/' . $lowongan->gambar) }}" alt="gambar"
                                class="img-fluid rounded">
                        </div>
                    </div>
                @endif

                <div class="card mt-3">
                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">Informasi Singkat</h5>
                    </div>
                    <div class="card-body">
                        <p><strong>Posisi:</strong> {{ $lowongan->judul }}</p>
                        <p><strong>Perusahaan:</strong> {{ optional($lowongan->perusahaan)->nama }}</p>
                        <p><strong>Lokasi:</strong> {{ $lowongan->lokasi }}</p>
                        <hr>
                        <a href="#" class="btn btn-primary btn-block w-100">Lamar Sekarang</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
