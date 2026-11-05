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
            {{-- <form> --}}

            <div class=" col-md-6 ">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Input Data Siswa</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    {{-- <form method="POST" action="{{ route('store.alumni') }}" enctype="multipart/form-data"> --}}
                    {{-- <form method="POST" action="{{ route('alumni.create') }}" enctype="multipart/form-data"> --}}
                    <form method="POST" action="{{ route('alumni.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleInputEmail1">NIPD</label>
                                <input name="nipd" type="text" class="form-control" id="nipd" placeholder="nipd"
                                    value="Nomer Induk Peserta Didik">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Nama Siswa</label>
                                <input name="nama_siswa" type="text" class="form-control" id="nama_siswa"
                                    placeholder="nipd" value="Nama Siswa">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Jenis Kelamin</label>
                                <input name="jk" type="text" class="form-control" id="jk" placeholder="nipd"
                                    value="L/P">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">NISN</label>
                                <input name="nisn" type="text" class="form-control" id="nisn" placeholder="nisn"
                                    value="NISN">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tempat Lahir</label>
                                <input name="tempat_lahir" type="text" class="form-control" id="tempat_lahir"
                                    placeholder="tempat_lahir" value="tempat_lahir">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Tanggal Lahir</label>
                                <input name="tanggal_lahir" type="date" class="form-control" id="nipd"
                                    placeholder="nipd" value="L/P">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">NIK</label>
                                <input name="nik" type="text" class="form-control" id="nik" placeholder="nik"
                                    value="NIK">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">agama</label>
                                <input name="agama" type="text" class="form-control" id="nipd" placeholder="nipd"
                                    value="Agama">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kebutuhan Khusus</label>
                                <input name="kebutuhan_khusus" type="text" class="form-control" id="nipd"
                                    placeholder="nipd" value="Kebutuhan Khusus A/B/C/D/Autis">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Alamat</label>
                                <input name="alamat" type="text" class="form-control" id="nipd" placeholder="nipd"
                                    value="Alamat">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">RT</label>
                                <input name="rt" type="text" class="form-control" id="nipd" placeholder="nipd"
                                    value="RT">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">RW</label>
                                <input name="rw" type="text" class="form-control" id="nipd"
                                    placeholder="nipd" value="RW">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Dusun</label>
                                <input name="dusun" type="text" class="form-control" id="nipd"
                                    placeholder="nipd" value="Dusun">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kelurahan</label>
                                <input name="kelurahan" type="text" class="form-control" id="nipd"
                                    placeholder="nipd" value="Kelurahan">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Kecamatan</label>
                                <input name="kecamatan" type="text" class="form-control" id="nipd"
                                    placeholder="nipd" value="Kecamatan">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Hand Phone</label>
                                <input name="hp" type="text" class="form-control" id="hp"
                                    placeholder="nipd" value="HandPhone">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input name="e-mail" type="email" class="form-control" id="exampleInputEmail1"
                                    placeholder="email" value="email@gmail.com">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Sertifikat</label>
                                <input name="sertifikat_keahlian" type="text" class="form-control" id="nipd"
                                    placeholder="Sertifikat" value="Sertifikat">
                                <input type="file" class="form-control mt-2" id="certificate_image"
                                    name="certificate_image" accept="image/*">

                            </div>
                            <div class="form-group mt-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="bekerja"
                                        name="bekerja">
                                    <label class="form-check-label" for="bekerja">
                                        Sudah Bekerja?
                                    </label>
                                </div>
                            </div>

                            <div id="employment-fields" style="display:none;">
                                <div class="form-group">
                                    <label for="kerja_di">Bekerja di (Perusahaan/Instansi)</label>
                                    <input name="kerja_di" type="text" class="form-control" id="kerja_di"
                                        placeholder="Nama Perusahaan">
                                </div>
                                <div class="form-group">
                                    <label for="kerja_mulai">Mulai Bekerja (Tanggal)</label>
                                    <input name="kerja_mulai" type="date" class="form-control" id="kerja_mulai">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Link Video</label>
                                <input name="link_video" type="text" class="form-control" id="nipd"
                                    placeholder="nipd" value="Link Video">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Keterangan</label>
                                <input name="keterangan" type="text" class="form-control" id="nipd"
                                    placeholder="nipd" value="Keterangan">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Asal Sekolah</label>
                                <input name="asal_sekolah" type="text" class="form-control" id="nipd"
                                    placeholder="nipd" value="Asal Sekolah">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputFile">File Foto</label>
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

            @php
                $id = Auth::user()->id;
                $adminData = App\Models\User::find($id);
            @endphp

            <div class="col-md-6  ">
                <div class="card card-danger">
                    <div class="card-header ">
                        <h3 class="card-title">Foto Siswa</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">

                        <div class="image text-center ">
                            <img id="showImage" {{-- src="{{ isset($adminData->profile_image) ? url('upload/alumni_images/' . $adminData->profile_image) : url('upload/noimage.jpg') }}" --}} <img
                                src="{{ isset($adminData->profile_image) ? url('upload/alumni_images/' . $adminData->profile_image) : url('upload/noimage.jpg') }}"
                                class="img-circle  elevation-2" alt="User Image" height="30%" width="50%">
                        </div>

                    </div>
                    <!-- /.card-body -->
                </div>
            </div>

        </div>

        {{-- </form> --}}

        <!-- /.row -->
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
        // Toggle employment fields when checkbox toggled
        document.addEventListener('DOMContentLoaded', function() {
            const bekerjaCheckbox = document.getElementById('bekerja');
            const employmentFields = document.getElementById('employment-fields');
            if (bekerjaCheckbox) {
                bekerjaCheckbox.addEventListener('change', function() {
                    employmentFields.style.display = this.checked ? 'block' : 'none';
                });
            }
        });
    </script>
@endsection

<script>
    // Toggle employment fields when checkbox toggled
    document.addEventListener('DOMContentLoaded', function() {
        const bekerjaCheckbox = document.getElementById('bekerja');
        const employmentFields = document.getElementById('employment-fields');
        if (bekerjaCheckbox) {
            bekerjaCheckbox.addEventListener('change', function() {
                employmentFields.style.display = this.checked ? 'block' : 'none';
            });
            // initialize
            employmentFields.style.display = bekerjaCheckbox.checked ? 'block' : 'none';
        }
    });
</script>
