@extends('admin.adminmaster')
@section('admin')
    <div class="container-fluid">
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </div>
        @endif

        <div class="row">
            <div class="col-md-6">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Hero</h3>
                    </div>
                    <form method="POST" action="{{ route('admin.hero.update', $hero) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Judul</label>
                                <input name="title" type="text" class="form-control" id="title" placeholder="Judul Hero" value="{{ $hero->title }}" required>
                            </div>
                            <div class="form-group">
                                <label for="subtitle">Subjudul</label>
                                <input name="subtitle" type="text" class="form-control" id="subtitle" placeholder="Subjudul Hero" value="{{ $hero->subtitle }}">
                            </div>
                            <div class="form-group">
                                <label for="image">Gambar Baru (Opsional)</label>
                                <input name="image" type="file" class="form-control" id="image" accept="image/*">
                                <small class="form-text text-muted">Biarkan kosong jika tidak ingin mengubah gambar.</small>
                                <div class="mt-2">
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
                                            $imgSrc = '';
                                        }
                                    @endphp
                                    <img id="current-image" src="{{ $imgSrc }}" alt="Current" style="max-width:200px; {{ $imgSrc ? '' : 'display:none;' }}" />
                                    <img id="preview-image" src="" alt="Preview" style="max-width:200px; display:none;" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input name="is_active" type="checkbox" class="form-check-input" id="is_active" {{ $hero->is_active ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Aktif</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('admin.hero.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        const input = document.getElementById('image');
        const preview = document.getElementById('preview-image');
        const current = document.getElementById('current-image');
        input.addEventListener('change', function(){
            const [file] = this.files;
            if (file) {
                preview.src = URL.createObjectURL(file);
                preview.style.display = 'block';
                if (current) current.style.display = 'none';
            } else {
                preview.src = '';
                preview.style.display = 'none';
                if (current) current.style.display = '';
            }
        });
    </script>
@endsection
