<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>SI-RAJAPEDE | {{ $alumni->nama_siswa }}</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('frontend/assets/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('frontend/assets/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('frontend/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('frontend/assets/css/main.css') }}" rel="stylesheet">
</head>

<body class="index-page">

    @include('frontend.body.header')

    <main class="main">

        <!-- Page Title -->
        <div class="page-title accent-background">
            <div class="container d-lg-flex justify-content-between align-items-center">
                <h1 class="mb-2 mb-lg-0">Detail Siswa</h1>
                <nav class="breadcrumbs">
                    <ol>
                        <li><a href="{{ route('frontend.home') }}">Home</a></li>
                        <li class="current">{{ $alumni->nama_siswa }}</li>
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Service Details Section -->
        <section id="service-details" class="service-details section">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        <h4>Nama</h4>
                        <p>{{ $alumni->nama_siswa }}</p>

                        <h4>NIPD</h4>
                        <p>{{ $alumni->nipd ?? '-' }}</p>

                        <h4>NISN</h4>
                        <p>{{ $alumni->nisn ?? '-' }}</p>

                        <h4>Jenis Kelamin</h4>
                        <p>{{ $alumni->jk == 'L' ? 'Laki-laki' : 'Perempuan' }}</p>

                        <h4>Umur</h4>
                        <p>
                            @php
                                $birthDate = \Carbon\Carbon::parse($alumni->tanggal_lahir);
                                $age = $birthDate->diffInYears(\Carbon\Carbon::now());
                            @endphp
                            {{ $age }} Tahun
                        </p>

                        <h4>Tempat Lahir</h4>
                        <p>{{ $alumni->tempat_lahir ?? '-' }}</p>

                        <h4>Tanggal Lahir</h4>
                        <p>{{ \Carbon\Carbon::parse($alumni->tanggal_lahir)->format('d M Y') }}</p>

                        <h4>Disabilitas</h4>
                        <p>{{ $alumni->kebutuhan_khusus ?? '-' }}</p>

                        <h4>Sertifikat Keahlian</h4>
                        <p>{{ $alumni->sertifikat_keahlian ?? '-' }}</p>

                        <h4>Sertifikat (Gambar)</h4>
                        @if (!empty($alumni->certificate_image))
                            <p>
                                <a href="{{ url('upload/certificate_images/' . $alumni->certificate_image) }}"
                                    target="_blank">
                                    <img src="{{ url('upload/certificate_images/' . $alumni->certificate_image) }}"
                                        alt="certificate" style="max-height:120px;">
                                </a>
                            </p>
                        @else
                            <p>-</p>
                        @endif

                        <h4>Status Bekerja</h4>
                        <p>{{ $alumni->bekerja ? 'Sudah Bekerja' : 'Belum Bekerja' }}</p>

                        <h4>Kerja Di</h4>
                        <p>{{ $alumni->kerja_di ?? '-' }}</p>

                        <h4>Mulai Bekerja</h4>
                        <p>{{ $alumni->kerja_mulai ? \Carbon\Carbon::parse($alumni->kerja_mulai)->format('d M Y') : '-' }}
                        </p>

                        <h4>Asal Sekolah</h4>
                        <p>{{ $alumni->asal_sekolah ?? '-' }}</p>

                        <h4>Email</h4>
                        <p>{{ $alumni->{'e-mail'} ?? '-' }}</p>

                        <h4>No. Telepon</h4>
                        <p>{{ $alumni->hp ?? '-' }}</p>

                    </div>

                    <div class="col-lg-8" data-aos="fade-up" data-aos-delay="200">

                        <h3>Foto Siswa</h3>
                        <div class="image text-left mb-5">
                            <img src="{{ isset($alumni->foto) ? url('upload/alumni_images/' . $alumni->foto) : url('upload/noimage.jpg') }}"
                                class="img-fluid elevation-2" alt="{{ $alumni->nama_siswa }}"
                                style="max-width: 400px; height: auto;">
                        </div>

                        <h3>Informasi Alamat</h3>
                        <div class="mb-4">
                            <p><strong>Alamat:</strong> {{ $alumni->alamat ?? '-' }}</p>
                            <p><strong>RT/RW:</strong> {{ $alumni->rt ?? '-' }}/{{ $alumni->rw ?? '-' }}</p>
                            <p><strong>Dusun:</strong> {{ $alumni->dusun ?? '-' }}</p>
                            <p><strong>Kelurahan:</strong> {{ $alumni->kelurahan ?? '-' }}</p>
                            <p><strong>Kecamatan:</strong> {{ $alumni->kecamatan ?? '-' }}</p>
                            <p><strong>Agama:</strong> {{ $alumni->agama ?? '-' }}</p>
                        </div>

                        <h3>Keterangan</h3>
                        <p>{{ $alumni->keterangan ?? 'Tidak ada keterangan' }}</p>

                        @if ($alumni->link_video)
                            <h3>Video Portfolio</h3>
                            <div class="mb-4">
                                <p><a href="{{ $alumni->link_video }}" target="_blank" class="btn btn-primary">
                                        <i class="bi bi-play-circle"></i> Lihat Video
                                    </a></p>
                            </div>
                        @endif

                        <div class="mt-4">
                            <a href="{{ route('frontend.home') }}" class="btn btn-secondary">
                                <i class="bi bi-arrow-left"></i> Kembali ke Beranda
                            </a>
                        </div>

                    </div>

                </div>

            </div>

        </section><!-- /Service Details Section -->

    </main>

    @include('frontend.body.footer')

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('frontend/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/imagesloaded/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/waypoints/noframework.waypoints.js') }}"></script>
    <script src="{{ asset('frontend/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('frontend/assets/js/main.js') }}"></script>

</body>

</html>
