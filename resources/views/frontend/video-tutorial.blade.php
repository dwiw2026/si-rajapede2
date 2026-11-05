@extends('frontend.master2')
@section('frontpage')
    <div class="container py-4">
        <h2 class="mb-4">Video Tutorial Bahasa Isyarat</h2>

        <div class="row gy-4">
            @forelse ($videos as $video)
                <div class="col-lg-4 col-md-6" data-aos="fade-up">
                    <div class="card h-100">
                        <div class="card-body">
                            <div class="video-wrapper mb-3">
                                <iframe width="100%" height="200" src="https://www.youtube.com/embed/{{ Str::after($video->link_youtube, 'v=') }}" frameborder="0" allowfullscreen></iframe>
                            </div>
                            <h5 class="card-title">{{ $video->judul }}</h5>
                            <p class="card-text">{{ Str::limit($video->keterangan, 100) }}</p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <p>Belum ada video tutorial.</p>
                </div>
            @endforelse
        </div>
    </div>
@endsection