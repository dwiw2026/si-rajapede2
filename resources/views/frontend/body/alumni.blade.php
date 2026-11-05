<section id="services" class="services section light-background">

    <div class="container">

        <div class="row gy-4">
            <h2 class="mb-4 text-center">Alumni Disabilitas Profesional</h2>

            <!-- Slider Container -->
            <div id="alumniSlider" class="alumni-slider-container">
                @foreach ($alumniGroups as $index => $group)
                    <div class="alumni-slide @if ($index === 0) active @endif"
                        id="slide-{{ $index }}"
                        style="display: @if ($index === 0) block @else none @endif;">
                        <div class="row gy-4">
                            @forelse ($group as $alumni)
                                <div class="col-lg-3 col-md-6" data-aos="fade-up">
                                    <div class="service-item item-cyan position-relative">
                                        <img class="img-fluid rounded-circle mb-3"
                                            src="{{ isset($alumni->foto) ? url('upload/alumni_images/' . $alumni->foto) : url('upload/noimage.jpg') }}"
                                            alt="{{ $alumni->nama_siswa }}"
                                            style="width: 200px; height: 200px; object-fit: cover;">

                                        <a href="{{ route('frontend.alumni.show', $alumni->id) }}"
                                            class="stretched-link">
                                            <h3>{{ $alumni->nama_siswa }}</h3>
                                        </a>

                                        <table class="table-sm">
                                            <tr>
                                                <td align="left" width="50%">Disabilitas</td>
                                                <td align="left" width="50%">:
                                                    {{ $alumni->kebutuhan_khusus ?? '-' }}</td>
                                            </tr>
                                            <tr>
                                                <td align="left" width="50%">Umur</td>
                                                <td align="left" width="50%">:
                                                    @php
                                                        $birthDate = \Carbon\Carbon::parse($alumni->tanggal_lahir);
                                                        $age = $birthDate->diffInYears(\Carbon\Carbon::now());
                                                    @endphp
                                                    {{ $age }} Tahun
                                                </td>
                                            </tr>
                                            <tr style="vertical-align: top;">
                                                <td align="left" width="50%">Sertifikat</td>
                                                <td align="left" width="50%">:
                                                    {{ $alumni->sertifikat_keahlian ?? '-' }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            @empty
                                <div class="col-12 text-center">
                                    <p>Tidak ada data alumni</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- Slider Navigation -->
            @if ($totalGroups > 1)
                <div class="col-12 mt-4 d-flex justify-content-center gap-2">
                    <button class="btn btn-outline-primary" id="prevBtn" onclick="prevSlide()">
                        <i class="bi bi-chevron-left"></i> Sebelumnya
                    </button>

                    <div id="slideIndicators" style="display: flex; gap: 5px; margin: 0 20px;">
                        @for ($i = 0; $i < $totalGroups; $i++)
                            <button class="slide-dot @if ($i === 0) active @endif"
                                onclick="goToSlide({{ $i }})"
                                style="width: 10px; height: 10px; border-radius: 50%; border: none; cursor: pointer; background-color: @if ($i === 0) #2487ce @else #ccc @endif; transition: all 0.3s;">
                            </button>
                        @endfor
                    </div>

                    <button class="btn btn-outline-primary" id="nextBtn" onclick="nextSlide()">
                        Selanjutnya <i class="bi bi-chevron-right"></i>
                    </button>
                </div>

                <script>
                    let currentSlide = 0;
                    const totalSlides = {{ $totalGroups }};

                    function showSlide(n) {
                        const slides = document.querySelectorAll('.alumni-slide');
                        const dots = document.querySelectorAll('.slide-dot');

                        if (n >= totalSlides) {
                            currentSlide = 0;
                        } else if (n < 0) {
                            currentSlide = totalSlides - 1;
                        } else {
                            currentSlide = n;
                        }

                        slides.forEach((slide, index) => {
                            slide.style.display = index === currentSlide ? 'block' : 'none';
                        });

                        dots.forEach((dot, index) => {
                            dot.style.backgroundColor = index === currentSlide ? '#2487ce' : '#ccc';
                        });
                    }

                    function nextSlide() {
                        showSlide(currentSlide + 1);
                    }

                    function prevSlide() {
                        showSlide(currentSlide - 1);
                    }

                    function goToSlide(n) {
                        showSlide(n);
                    }
                </script>
            @endif

        </div>

    </div>

</section>
