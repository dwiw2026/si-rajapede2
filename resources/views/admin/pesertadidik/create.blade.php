@extends('admin.adminmaster')
@section('admin')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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
                        <h3 class="card-title">Input Data Peserta Didik</h3>
                    </div>

                    <form method="POST" action="{{ route('pesertadidik.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label>NIPD</label>
                                <input name="nipd" type="text" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label>Nama Siswa</label>
                                <input name="nama_siswa" type="text" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label>Kelas</label>
                                <input name="kelas" type="text" class="form-control" value="">
                            </div>

                            <div class="form-group mt-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="sudah_magang"
                                        name="sudah_magang">
                                    <label class="form-check-label" for="sudah_magang">
                                        Sudah Magang?
                                    </label>
                                </div>
                            </div>

                            <div id="magang-fields" style="display:none;">
                                <div class="form-group">
                                    <label>Magang di (Perusahaan/Instansi)</label>
                                    <input name="magang_di" type="text" class="form-control"
                                        placeholder="Nama Perusahaan">
                                </div>
                                <div class="form-group">
                                    <label>Mulai Magang (Tanggal)</label>
                                    <input name="magang_mulai" type="date" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Asal Sekolah</label>
                                <input name="asal_sekolah" type="text" class="form-control" value="">
                            </div>

                            <div class="form-group">
                                <label>Sertifikat Keahlian</label>
                                <input name="sertifikat_keahlian" type="text" class="form-control" value="">
                                <input type="file" class="form-control mt-2" id="certificate_image" name="certificate_image" accept="image/*">
                            </div>

                            <div class="form-group">
                                <label>Link Video</label>
                                <input name="link_video" type="text" class="form-control" value="">
                            </div>

                            <div class="form-group">
                                <label>File Foto</label>
                                <div>
                                    <input type="file" class="form-control" id="image" name="foto">
                                </div>
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Save </button>
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
                            <img id="showImage" src="{{ url('upload/noimage.jpg') }}" class="img-circle  elevation-2"
                                alt="User Image" height="30%" width="50%">
                        </div>

                    </div>
                </div>
            </div>

        </div>

        <script type="text/javascript">
            $(document).ready(function() {
                $('#image').change(function(e) {
                    let reader = new FileReader()
                    reader.onload = function(e) {
                        $('#showImage').attr('src', e.target.result)
                    }
                    reader.readAsDataURL(e.target.files['0'])

                })
            })
        </script>
        <script>
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
