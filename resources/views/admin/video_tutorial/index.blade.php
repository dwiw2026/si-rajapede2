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

        <h2>Data Video Tutorial</h2>
        <div class="table-responsive small col-lg-12 ">
            <div class="text-end">
                <a href="{{ route('admin.video_tutorial.create') }}" class="btn btn-primary mb-3">Tambah</a>
            </div>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Judul</th>
                        <th scope="col">Keterangan</th>
                        <th scope="col">Link YouTube</th>
                        <th scope="col" class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($video_tutorials as $video)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $video->judul }}</td>
                            <td>{{ Str::limit($video->keterangan, 50) }}</td>
                            <td><a href="{{ $video->link_youtube }}" target="_blank">{{ $video->link_youtube }}</a></td>
                            <td class="text-end">
                                <a href="{{ route('admin.video_tutorial.edit', $video) }}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{ route('admin.video_tutorial.destroy', $video) }}" method="POST" style="display:inline;">
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