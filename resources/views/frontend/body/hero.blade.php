<section id="hero" class="hero section dark-background">

    <div id="hero-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel" data-bs-interval="4000">

        @if($heroes->count() > 0)
            @foreach($heroes as $index => $hero)
                <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                    @php
                        $imageUrl = $hero->image;
                        if ($imageUrl) {
                            if (str_starts_with($imageUrl, 'http://') || str_starts_with($imageUrl, 'https://') || str_starts_with($imageUrl, '/')) {
                                $imgSrc = $imageUrl;
                            } elseif (str_starts_with($imageUrl, 'hero_images/')) {
                                $imgSrc = asset('storage/' . ltrim($imageUrl, '/'));
                            } else {
                                $imgSrc = asset($imageUrl);
                            }
                        } else {
                            $imgSrc = asset('frontend/assets/img/hero-carousel/hero-carousel-1.jpg');
                        }
                    @endphp
                    <img src="{{ $imgSrc }}" alt="{{ $hero->title }}">
                    <div class="container">
                        <h2>{{ $hero->title }}</h2>
                        @if($hero->subtitle)
                            <h3><font color="yellow">{{ $hero->subtitle }}</font></h3>
                        @endif
                    </div>
                </div><!-- End Carousel Item -->
            @endforeach
        @else
            <!-- Fallback to static heroes -->
            <div class="carousel-item active">
                <img src="{{ asset('frontend/assets/img/hero-carousel/hero-carousel-1.jpg') }}" alt="">
                <div class="container">
                    <h2>SI - RAJAPEDE</h2>
                    <H3>
                        <font color="yellow">Sistem Informasi Rekam Jejak Pengandang Disabilitas </font>
                    </H3>
                </div>
            </div><!-- End Carousel Item -->

            <div class="carousel-item">
                <img src="{{ asset('frontend/assets/img/hero-carousel/hero-carousel-2.jpg') }}" alt="">
                <div class="container">
                    <h2>SI - RAJAPEDE</h2>
                    <H3>
                        <font color="yellow">Sistem Informasi Rekam Jejak Pengandang Disabilitas </font>
                    </H3>
                </div>
            </div><!-- End Carousel Item -->

            <div class="carousel-item">
                <img src="{{ asset('frontend/assets/img/hero-carousel/hero-carousel-3.jpg') }}" alt="">
                <div class="container">
                    <h2>SI - RAJAPEDE</h2>
                    <H3>
                        <font color="yellow">Sistem Informasi Rekam Jejak Pengandang Disabilitas </font>
                    </H3>
                </div>
            </div><!-- End Carousel Item -->

            <div class="carousel-item">
                <img src="{{ asset('frontend/assets/img/hero-carousel/hero-carousel-4.jpg') }}" alt="">
                <div class="container">
                    <h2>SI - RAJAPEDE</h2>
                    <H3>
                        <font color="yellow">Sistem Informasi Rekam Jejak Pengandang Disabilitas </font>
                    </H3>
                </div>
            </div><!-- End Carousel Item -->
        @endif

        <a class="carousel-control-prev" href="#hero-carousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>
        <a class="carousel-control-next" href="#hero-carousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

        <ol class="carousel-indicators"></ol>

    </div>

</section><!-- /Hero Section -->
