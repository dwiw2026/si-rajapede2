<section id="video-tutorial" class="services section light-background">
    <div class="container">
        <div class="row gy-4">
            <h2 class="mb-4 text-center">Video Tutorial Bahasa Isyarat</h2>

            <div class="row gy-4">
                @forelse ($videoTutorials as $video)
                    <div class="col-lg-3 col-md-6" data-aos="fade-up">
                        <div class="service-item item-cyan position-relative">
                            <div class="video-wrapper mb-3">
                                <iframe width="100%" height="200" src="https://www.youtube.com/embed/{{ Str::after($video->link_youtube, 'v=') }}" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <h3>{{ $video->judul }}</h3>
                            <p>{{ Str::limit($video->keterangan, 100) }}</p>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center">
                        <p>Belum ada video tutorial.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</section>