@extends('admin.adminmaster')
@section('admin')
    <div class="row">
        <h2>Data Peserta Didik</h2>
        <div class="table-responsive small col-lg-12 ">
            <div class="text-end">
                <a href="{{ route('pesertadidik.create') }}" class="btn btn-primary mb-3 ">Tambah</a>
            </div>
            <table class="table table-striped table-sm">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Kelas</th>
                        <th scope="col">Asal Sekolah</th>
                        <th scope="col">Sertifikat</th>
                        <th scope="col">Link Video</th>
                        <th scope="col">Sudah Magang</th>
                        <th scope="col">Magang Di</th>
                        <th scope="col">Mulai Magang</th>
                        <th scope="col" class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($peserta as $p)
                        <tr>
                            <td>{{ $p->id }}</td>
                            <td>
                                <div class="image text-center ">
                                    <img src="{{ isset($p->foto) ? url('upload/peserta_images/' . $p->foto) : url('upload/noimage.jpg') }}"
                                        class=" elevation-2" alt="User Image" height="100">
                                </div>
                            </td>
                            <td>{{ $p->nama_siswa }}</td>
                            <td>{{ $p->kelas }}</td>
                            <td>{{ $p->asal_sekolah }}</td>
                            <td>
                                @if($p->certificate_image && file_exists(public_path('upload/certificate_images/' . $p->certificate_image)))
                                    <img src="{{ asset('upload/certificate_images/' . $p->certificate_image) }}" alt="cert" height="60">
                                @else
                                    -
                                @endif
                            </td>
                            <td>
                                @if($p->link_video)
                                    <a href="{{ $p->link_video }}" target="_blank">Lihat Video</a>
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $p->sudah_magang ? 'Ya' : 'Tidak' }}</td>
                            <td>{{ $p->magang_di ?? '-' }}</td>
                            <td>{{ $p->magang_mulai ? \Carbon\Carbon::parse($p->magang_mulai)->format('Y-m-d') : '-' }}</td>
                            <td class="text-end">
                                <div class="margin">
                                    <div class="btn-group">
                                        <a href="{{ route('admin.pesertadidik.edit', $p->id) }}"> <button type="button"
                                                class="btn btn-warning">Edit</button> </a>
                                    </div>
                                    <div class="btn-group">
                                        <form action="{{ route('pesertadidik.destroy') }} " method="post">
                                            @csrf
                                            <input type="hidden" name="id" value="{{ $p->id }}">
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
