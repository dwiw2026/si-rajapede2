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


        <h2>Data Alumni</h2>
        <div class="table-responsive small col-lg-12 ">
            <div class="text-end">
                {{-- <a href="{{ route('edit.adminprofile') }}" class="btn btn-primary mb-3 ">Tambah</a> --}}
                <a href="{{ route('alumni.create') }}" class="btn btn-primary mb-3 ">Tambah</a>
            </div>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Asal Sekolah</th>
                        <th scope="col">Sertifikat Keahlian</th>
                        <th scope="col">Status Bekerja</th>
                        <th scope="col">Kerja Di</th>
                        <th scope="col">Mulai Bekerja</th>
                        <th scope="col">Sertifikat (Gambar)</th>
                        <th scope="col" class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alumnis as $alumni)
                        <tr>
                            {{-- <td>{{ $loop->iteration }}</td> --}}
                            <td>{{ $alumni->id }}</td>
                            {{-- <td>{{ $alumni->foto }} --}}
                            <td>
                                <div class="image text-center ">
                                    <img src="{{ isset($alumni->foto) ? url('upload/alumni_images/' . $alumni->foto) : url('upload/noimage.jpg') }}"
                                        class=" elevation-2" alt="User Image" height="100">
                                </div>
                            </td>
                            {{-- <div class="image text-center ">
                                    <img src="{{ isset($adminData->profile_image) ? url('upload/user_images/' . $adminData->profile_image) : url('upload/noimage.jpg') }}"
                                        class="img-circle elevation-2" alt="User Image" height="150">
                                </div> --}}

                            </td>
                            <td>{{ $alumni->nama_siswa }}</td>
                            <td>{{ $alumni->asal_sekolah }}</td>
                            <td>{{ $alumni->sertifikat_keahlian }}</td>
                            <td>{{ $alumni->bekerja ? 'Ya' : 'Tidak' }}</td>
                            <td>{{ $alumni->kerja_di ?? '-' }}</td>
                            <td>{{ $alumni->kerja_mulai ? \Carbon\Carbon::parse($alumni->kerja_mulai)->format('Y-m-d') : '-' }}
                            </td>
                            <td>
                                @if (!empty($alumni->certificate_image))
                                    <img src="{{ url('upload/certificate_images/' . $alumni->certificate_image) }}"
                                        height="60" alt="cert">
                                @else
                                    -
                                @endif
                            </td>
                            <td class="text-end">
                                <div class="margin">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.alumni.edit', $alumni->id) }}"> <button type="button"
                                                class="btn btn-warning">Edit</button> </a>
                                    </div>
                                    <div class="btn-group">

                                        {{-- <form action="/admin/alumni/index/{{ $alumni->id }} " method="POST"> --}}
                                        <form action="{{ route('alumni.destroy', $alumni->id) }}" method="post">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger"
                                                onclick="return confirm('anda yakin?')">Hapus</button>

                                        </form>
                                    </div>
                                </div>

                            </td>
                        </tr>
                    @endforeach


                </tbody>
            </table>
        </div>


    </div>
@endsection
