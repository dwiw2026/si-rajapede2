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
                        <h3 class="card-title">Tambah Hero</h3>
                    </div>
                    <form method="POST" action="{{ route('admin.hero.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Judul</label>
                                <input name="title" type="text" class="form-control" id="title" placeholder="Judul Hero" required>
                            </div>
                            <div class="form-group">
                                <label for="subtitle">Subjudul</label>
                                <input name="subtitle" type="text" class="form-control" id="subtitle" placeholder="Subjudul Hero">
                            </div>
                            <div class="form-group">
                                <label for="image">Gambar</label>
                                <input name="image" type="file" class="form-control" id="image" accept="image/*" required>
                                <div class="mt-2">
                                    <img id="preview-image" src="" alt="Preview" style="max-width:200px; display:none;" />
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-check">
                                    <input name="is_active" type="checkbox" class="form-check-input" id="is_active" unchecked>
                                    <label class="form-check-label" for="is_active">Aktif</label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('admin.hero.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.getElementById('image').addEventListener('change', function(e){
            const [file] = this.files;
            const img = document.getElementById('preview-image');
            if (file) {
                img.src = URL.createObjectURL(file);
                img.style.display = 'block';
            } else {
                img.src = '';
                img.style.display = 'none';
            }
        });
    </script>
@endsection
