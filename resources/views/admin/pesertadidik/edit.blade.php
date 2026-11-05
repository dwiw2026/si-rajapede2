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
            <div class=" col-md-6 ">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Data Peserta Didik</h3>
                    </div>

                    <form method="POST" action="{{ route('admin.pesertadidik.update', $peserta->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="form-group">
                                <label>NIPD</label>
                                <input name="nipd" type="text" class="form-control" value="{{ $peserta->nipd }}">
                            </div>
                            <div class="form-group">
                                <label>Nama Siswa</label>
                                <input name="nama_siswa" type="text" class="form-control"
                                    value="{{ $peserta->nama_siswa }}">
                            </div>
                            <div class="form-group">
                                <label>Kelas</label>
                                <input name="kelas" type="text" class="form-control" value="{{ $peserta->kelas }}">
                            </div>

                            <div class="form-group mt-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="sudah_magang"
                                        name="sudah_magang" {{ $peserta->sudah_magang ? 'checked' : '' }}>
                                    <label class="form-check-label" for="sudah_magang">
                                        Sudah Magang?
                                    </label>
                                </div>
                            </div>

                            <div id="magang-fields" style="display:{{ $peserta->sudah_magang ? 'block' : 'none' }};">
                                <div class="form-group">
                                    <label>Magang di (Perusahaan/Instansi)</label>
                                    <input name="magang_di" type="text" class="form-control"
                                        value="{{ $peserta->magang_di }}">
                                </div>
                                <div class="form-group">
                                    <label>Mulai Magang (Tanggal)</label>
                                    <input name="magang_mulai" type="date" class="form-control"
                                        value="{{ $peserta->magang_mulai }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Asal Sekolah</label>
                                <input name="asal_sekolah" type="text" class="form-control"
                                    value="{{ $peserta->asal_sekolah }}">
                            </div>

                            <div class="form-group">
                                <label>Sertifikat Keahlian</label>
                                <input name="sertifikat_keahlian" type="text" class="form-control"
                                    value="{{ $peserta->sertifikat_keahlian }}">
                                <input type="file" class="form-control mt-2" id="certificate_image" name="certificate_image" accept="image/*">
                                @if(isset($peserta->certificate_image) && $peserta->certificate_image)
                                    <p class="mt-2">File saat ini: <a href="{{ asset('upload/certificate_images/' . $peserta->certificate_image) }}" target="_blank">{{ $peserta->certificate_image }}</a></p>
                                @endif
                            </div>

                            <div class="form-group">
                                <label>Link Video</label>
                                <input name="link_video" type="text" class="form-control" value="{{ $peserta->link_video }}">
                            </div>

                            <div class="form-group">
                                <label>File Foto</label>
                                <div>
                                    <input type="file" class="form-control" id="image" name="foto">
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Update </button>
                        </div>
                    </form>

                </div>
            </div>

            <div class="col-md-6  ">
                <div class="card card-danger">
                    <div class="card-header ">
                        <h3 class="card-title">Foto Peserta</h3>
                    </div>
                    <div class="card-body">

                        <div class="image text-center ">
                            <img id="showImage"
                                src="{{ isset($peserta->foto) ? url('upload/peserta_images/' . $peserta->foto) : url('upload/noimage.jpg') }}"
                                class="img-circle  elevation-2" alt="User Image" height="30%" width="50%">
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
                const magangCheckbox = document.getElementById('sudah_magang');
                const magangFields = document.getElementById('magang-fields');
                if (magangCheckbox) {
                    magangCheckbox.addEventListener('change', function() {
                        magangFields.style.display = this.checked ? 'block' : 'none';
                    });
                }
            });
        </script>
    </div>
@endsection
