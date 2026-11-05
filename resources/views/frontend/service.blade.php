<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>SI-RAJAPEDE</title>
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

    <!-- =======================================================
  * Template Name: Company
  * Template URL: https://bootstrapmade.com/company-free-html-bootstrap-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
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
                        {{-- <li><a href="index.html">Home</a></li>
                        <li class="current">Service Details</li> --}}
                    </ol>
                </nav>
            </div>
        </div><!-- End Page Title -->

        <!-- Service Details Section -->
        <section id="service-details" class="service-details section">

            <div class="container">

                <div class="row gy-4">

                    <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                        {{-- <div class="services-list">
                            <a href="#" class="active">SALSABILA RAMADHANI</a>
                            <a href="#">Software Development</a>
                            <a href="#">Product Management</a>
                            <a href="#">Graphic Design</a>
                            <a href="#">Marketing</a>
                        </div> --}}

                        <h4>Nama</h4>
                        <p>SALSABILA AZIZAH</p>
                        <h4>Umur</h4>
                        <p>19 Tahun</p>
                        <h4>Sertifikat</h4>
                        <p>Pelatihan Souvenir</p>

                    </div>


                    <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">


                        <h3>Foto Siswa</h3>

                        <div class="image text-left mb-5 ">
                            {{-- <img src="{{ isset($alumni->foto) ? url('upload/alumni_images/' . $alumni->foto) : url('upload/noimage.jpg') }}" --}}
                            <img src="{{ isset($alumni->foto) ? url('upload/alumni_images/' . $alumni->foto) : url('upload/alumni_images/202504122159Chel Sylia.png') }}"
                                class=" elevation-2" alt="User Image" height="200">
                        </div>


                        <h3>Sertifikat</h3>

                        <div class="image text-left mb-5 ">
                            {{-- <img src="{{ isset($alumni->foto) ? url('upload/alumni_images/' . $alumni->foto) : url('upload/noimage.jpg') }}" --}}
                            <img src="{{ isset($alumni->foto) ? url('upload/alumni_images/' . $alumni->foto) : url('upload/sertifikat_images/sertifikat1.png') }}"
                                class=" elevation-2" alt="User Image" height="500">
                        </div>

                        {{-- <div class="image text-center ">
                                <img src="{{ isset($alumni->foto) ? url('upload/alumni_images/' . $alumni->foto) : url('upload/noimage.jpg') }}"
                                    class=" elevation-2" alt="User Image" height="100">
                            </div> --}}

                        <h3>Link Video</h3>
                        <div class="col-md-4 mb-4 aos-init aos-animate" data-aos="flip-right" data-aos-delay="100"
                            style="width: 100%; float: left; margin: 10px 0px 0px 0px;">
                            <div class="iframe-container mb-3" style="min-height: 400px;min-width:100%;">
                                <iframe class="instagram-media instagram-media-rendered" id="instagram-embed-0"
                                    src="https://www.instagram.com/reel/DHsP9XYNEE6/embed/captioned/?cr=1&amp;v=14&amp;wp=435&amp;rd=https%3A%2F%2Fslbbpertiwikotamr.sch.id&amp;rp=%2Fgallery%2Fpage#%7B%22ci%22%3A0%2C%22os%22%3A1605.5999999940395%2C%22ls%22%3A177.29999999701977%2C%22le%22%3A1463.7999999970198%7D"
                                    allowtransparency="true" allowfullscreen="true" frameborder="0" height="533"
                                    data-instgrm-payload-id="instagram-media-payload-0" scrolling="no"
                                    style="background: white; max-width: 540px; width: calc(100% - 2px); border-radius: 3px; border: 1px solid rgb(219, 219, 219); box-shadow: none; display: block; margin: 0px 0px 12px; min-width: 326px; padding: 0px;"></iframe>
                                <script async="" src="//www.instagram.com/embed.js"></script>
                            </div>
                        </div>

                        {{-- <img src="assets/img/services.jpg" alt="" class="img-fluid services-img"> --}}
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
