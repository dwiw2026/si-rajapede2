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
                        <h3 class="card-title">Edit Video Tutorial</h3>
                    </div>
                    <form method="POST" action="{{ route('admin.video_tutorial.update', $video_tutorial) }}">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="judul">Judul</label>
                                <input name="judul" type="text" class="form-control" id="judul" placeholder="Judul Video" value="{{ $video_tutorial->judul }}" required>
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <textarea name="keterangan" class="form-control" id="keterangan" placeholder="Keterangan Video">{{ $video_tutorial->keterangan }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="link_youtube">Link YouTube</label>
                                <input name="link_youtube" type="url" class="form-control" id="link_youtube" placeholder="https://www.youtube.com/watch?v=..." value="{{ $video_tutorial->link_youtube }}" required>
                            </div>
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('admin.video_tutorial.index') }}" class="btn btn-secondary">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection