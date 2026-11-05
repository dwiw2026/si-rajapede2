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
                        <h3 class="card-title">Tambah Video Tutorial</h3>
                    </div>
                    <form method="POST" action="{{ route('admin.video_tutorial.store') }}">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input name="judul" type="text" class="form-control" id="judul" placeholder="Judul Video" required>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" class="form-control" id="keterangan" placeholder="Keterangan Video"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="link_youtube">Link YouTube</label>
                                <input name="link_youtube" type="url" class="form-control" id="link_youtube" placeholder="https://www.youtube.com/watch?v=..." required>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('admin.video_tutorial.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection