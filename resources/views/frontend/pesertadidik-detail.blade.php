@extends('frontend.master2')
@section('frontpage')
    <div class="container py-4">
        <div class="row">
            <div class="col-md-8">
                <h1>{{ $peserta->nama_siswa }}</h1>
                <p><strong>Kelas:</strong> {{ $peserta->kelas ?? '-' }}</p>
                <p><strong>Asal Sekolah:</strong> {{ $peserta->asal_sekolah ?? '-' }}</p>
                <p><strong>Sedang Magang:</strong> {{ $peserta->sudah_magang ? 'Sudah Magang' : 'Belum' }}</p>
                <p><strong>Magang di:</strong> {{ $peserta->magang_di ?? '-' }}</p>

                @if($peserta->certificate_image && file_exists(public_path('upload/certificate_images/' . $peserta->certificate_image)))
                    <p><strong>Sertifikat:</strong></p>
                    <img src="{{ asset('upload/certificate_images/' . $peserta->certificate_image) }}" alt="Sertifikat" class="img-fluid mb-3" style="max-width:400px;">
                @endif

                @if($peserta->link_video)
                    <p><strong>Video:</strong></p>
                    @php
                        $embed = null;
                        if(str_contains($peserta->link_video, 'youtube') || str_contains($peserta->link_video, 'youtu.be')) {
                            if(str_contains($peserta->link_video, 'watch?v=')) {
                                $embed = str_replace('watch?v=', 'embed/', $peserta->link_video);
                            } elseif(str_contains($peserta->link_video, 'youtu.be/')) {
                                $videoId = explode('youtu.be/', $peserta->link_video)[1];
                                $embed = 'https://www.youtube.com/embed/' . $videoId;
                            }
                        }
                    @endphp

                    @if($embed)
                        <div class="ratio ratio-16x9 mb-3">
                            <iframe src="{{ $embed }}" title="Video" allowfullscreen></iframe>
                        </div>
                    @else
                        <a href="{{ $peserta->link_video }}" target="_blank">{{ $peserta->link_video }}</a>
                    @endif
                @endif

                <a href="{{ route('frontend.pesertadidik') }}" class="btn btn-secondary mt-3"><i class="bi bi-arrow-left"></i>
                    Kembali</a>
            </div>
            <div class="col-md-4">
                <div class="text-center">
                    <h5>Foto Siswa</h5>
                    @if($peserta->foto && file_exists(public_path('upload/peserta_images/' . $peserta->foto)))
                        <img src="{{ asset('upload/peserta_images/' . $peserta->foto) }}"
                             alt="{{ $peserta->nama_siswa }}"
                             class="img-fluid rounded"
                             style="max-width: 300px;">
                    @else
                        <img src="{{ asset('upload/noimage.jpg') }}"
                             alt="No Image"
                             class="img-fluid rounded"
                             style="max-width: 300px;">
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
