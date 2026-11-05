@extends('admin.adminmaster')
@section('admin')
    <div class="row">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <h2>Data Hero</h2>
        <div class="table-responsive small col-lg-12 ">
            <div class="text-end">
                <a href="{{ route('admin.hero.create') }}" class="btn btn-primary mb-3">Tambah</a>
            </div>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Gambar</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Subjudul</th>
                        <th scope="col">Aktif</th>
                        <th scope="col" class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($heroes as $hero)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
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
                                <img src="{{ $imgSrc }}" alt="{{ $hero->title }}" width="100">
                            </td>
                            <td>{{ $hero->title }}</td>
                            <td>{{ $hero->subtitle ?? '-' }}</td>
                            <td>{{ $hero->is_active ? 'Ya' : 'Tidak' }}</td>
                            <td class="text-end">
                                <a href="{{ route('admin.hero.edit', $hero) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.hero.destroy', $hero) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
