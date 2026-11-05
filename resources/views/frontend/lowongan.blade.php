@extends('frontend.master2')
@section('frontpage')
    <div class="container my-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="mb-0">Daftar Lowongan Kerja</h2>
        </div>

        <form class="card mb-4 p-3" method="get" action="{{ route('frontend.lowongan') }}">
            <div class="row g-2">
                <div class="col-md-6">
                    <input name="q" class="form-control" type="search" placeholder="Cari judul, perusahaan..."
                        value="{{ request('q') }}">
                </div>
                <div class="col-md-4">
                    <select name="perusahaan_id" class="form-select">
                        <option value="">Semua Perusahaan</option>
                        @foreach ($perusahaans as $p)
                            <option value="{{ $p->id }}" {{ request('perusahaan_id') == $p->id ? 'selected' : '' }}>
                                {{ $p->nama }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-md-2">
                    <button class="btn btn-primary w-100" type="submit">Filter</button>
                </div>
            </div>
        </form>

        @forelse($lowongans as $lowongan)
            <div class="card mb-3 shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-8">
                            <h5 class="card-title mb-1">
                                <a href="{{ route('frontend.lowongan.show', $lowongan->id) }}" class="text-decoration-none">
                                    {{ $lowongan->judul }}
                                </a>
                            </h5>
                            <p class="card-text text-muted mb-2">
                                <strong>{{ optional($lowongan->perusahaan)->nama }}</strong> • {{ $lowongan->lokasi }}
                            </p>
                            <p class="card-text mb-2">
                                <small>
                                    @if ($lowongan->kategori_pekerjaan)
                                        <span class="badge bg-info">{{ $lowongan->kategori_pekerjaan }}</span>
                                    @endif
                                    @if ($lowongan->jenis_pekerjaan)
                                        <span class="badge bg-warning">{{ $lowongan->jenis_pekerjaan }}</span>
                                    @endif
                                </small>
                            </p>
                            <p class="card-text small text-muted">
                                <i class="bi bi-calendar2-event"></i>
                                Posting:
                                {{ $lowongan->tanggal_posting ? \Carbon\Carbon::parse($lowongan->tanggal_posting)->format('d M Y') : 'N/A' }}
                                |
                                Berakhir: {{ \Carbon\Carbon::parse($lowongan->tanggal_berakhir)->format('d M Y') }}
                            </p>
                            @if ($lowongan->gaji_min || $lowongan->gaji_max)
                                <p class="card-text small">
                                    <strong>Gaji:</strong> {{ $lowongan->gaji_min ?? 'Tidak diketahui' }} -
                                    {{ $lowongan->gaji_max ?? 'Tidak diketahui' }}
                                </p>
                            @endif
                        </div>
                        <div class="col-md-4 text-center">
                            @if ($lowongan->gambar)
                                <img src="{{ asset('storage/' . $lowongan->gambar) }}" alt="gambar"
                                    style="max-height: 150px;" class="img-fluid rounded">
                            @else
                                <div style="width:100%; height:150px; background:#f0f0f0;"
                                    class="rounded d-flex align-items-center justify-content-center">
                                    <span class="text-muted">Tidak ada gambar</span>
                                </div>
                            @endif
                            <a href="{{ route('frontend.lowongan.show', $lowongan->id) }}"
                                class="btn btn-sm btn-primary mt-2 w-100">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="alert alert-info text-center">
                Tidak ada lowongan saat ini.
            </div>
        @endforelse

        <div class="mt-4">
            {{ $lowongans->links() }}
        </div>
    </div>
@endsection
