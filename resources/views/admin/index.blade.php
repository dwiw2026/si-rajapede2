@extends('admin.adminmaster')
@section('admin')
    <div class="container-fluid">
        <!-- Stats Row -->
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <!-- Alumni Box -->
                <div class="small-box bg-info shadow-lg">
                    <div class="inner">
                        <h3>{{ $alumniCount ?? 0 }}</h3>
                        <p>Alumni Terdaftar</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-users"></i>
                    </div>
                    <a href="{{ route('admin.alumni.index') }}" class="small-box-footer">
                        Lihat Data <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <!-- Lowongan Box -->
                <div class="small-box bg-success shadow-lg">
                    <div class="inner">
                        <h3>{{ $lowonganCount ?? 0 }}</h3>
                        <p>Lowongan Tersedia</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <a href="{{ route('lowongan.index') }}" class="small-box-footer">
                        Kelola Lowongan <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <!-- Sekolah Box -->
                <div class="small-box bg-warning shadow-lg">
                    <div class="inner">
                        <h3>{{ $sekolahCount ?? 0 }}</h3>
                        <p>Sekolah Terdaftar</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-school"></i>
                    </div>
                    <a href="{{ route('sekolah.index') }}" class="small-box-footer">
                        Kelola Sekolah <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <!-- Perusahaan Box -->
                <div class="small-box bg-danger shadow-lg">
                    <div class="inner">
                        <h3>{{ $perusahaanCount ?? 0 }}</h3>
                        <p>Perusahaan Terdaftar</p>
                    </div>
                    <div class="icon">
                        <i class="fas fa-building"></i>
                    </div>
                    <a href="{{ route('perusahaan.index') }}" class="small-box-footer">
                        Kelola Perusahaan <i class="fas fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>

        <!-- Data Tables Row -->
        <div class="row mt-4">
            <!-- Recent Alumni -->
            <div class="col-lg-6">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Alumni Terbaru</h3>
                    </div>
                    <div class="card-body">
                        @if ($recentAlumni->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-sm table-striped">
                                    <thead>
                                        <tr>
                                            <th>Nama</th>
                                            <th>Sekolah</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($recentAlumni as $alumni)
                                            <tr>
                                                <td>{{ $alumni->nama_siswa }}</td>
                                                <td class="text-muted"><small>{{ $alumni->asal_sekolah }}</small></td>
                                                <td>
                                                    <a href="{{ route('admin.alumni.edit', $alumni->id) }}"
                                                        class="btn btn-xs btn-info">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-muted">Belum ada data alumni</p>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Recent Lowongans -->
            <div class="col-lg-6">
                <div class="card card-success card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Lowongan Terbaru</h3>
                    </div>
                    <div class="card-body">
                        @if ($recentLowongans->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-sm table-striped">
                                    <thead>
                                        <tr>
                                            <th>Judul</th>
                                            <th>Perusahaan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($recentLowongans as $lowongan)
                                            <tr>
                                                <td>{{ $lowongan->judul }}</td>
                                                <td class="text-muted">
                                                    <small>{{ optional($lowongan->perusahaan)->nama }}</small></td>
                                                <td>
                                                    <a href="{{ route('lowongan.edit', $lowongan->id) }}"
                                                        class="btn btn-xs btn-info">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <p class="text-muted">Belum ada data lowongan</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
