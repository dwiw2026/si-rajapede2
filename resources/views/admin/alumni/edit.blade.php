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
                        <h3 class="card-title">Edit Data Siswa - {{ $alumni->nama_siswa }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->

                    <form method="POST" action="{{ route('admin.alumni.update', $alumni->id) }}"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="nipd">NIPD</label>
                                <input name="nipd" type="text" class="form-control" id="nipd"
                                    value="{{ $alumni->nipd }}" required>
                            </div>
                            <div class="form-group">
                                <label for="nama_siswa">Nama Siswa</label>
                                <input name="nama_siswa" type="text" class="form-control" id="nama_siswa"
                                    value="{{ $alumni->nama_siswa }}" required>
                            </div>
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select name="jk" class="form-control" id="jk" required>
                                    <option value="L" {{ $alumni->jk == 'L' ? 'selected' : '' }}>Laki-laki</option>
                                    <option value="P" {{ $alumni->jk == 'P' ? 'selected' : '' }}>Perempuan</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="nisn">NISN</label>
                                <input name="nisn" type="text" class="form-control" id="nisn"
                                    value="{{ $alumni->nisn }}" required>
                            </div>
                            <div class="form-group">
                                <label for="tempat_lahir">Tempat Lahir</label>
                                <input name="tempat_lahir" type="text" class="form-control" id="tempat_lahir"
                                    value="{{ $alumni->tempat_lahir }}" required>
                            </div>
                            <div class="form-group">
                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                <input name="tanggal_lahir" type="date" class="form-control" id="tanggal_lahir"
                                    value="{{ $alumni->tanggal_lahir }}" required>
                            </div>

                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input name="nik" type="text" class="form-control" id="nik"
                                    value="{{ $alumni->nik }}" required>
                            </div>
                            <div class="form-group">
                                <label for="agama">Agama</label>
                                <input name="agama" type="text" class="form-control" id="agama"
                                    value="{{ $alumni->agama }}" required>
                            </div>
                            <div class="form-group">
                                <label for="kebutuhan_khusus">Kebutuhan Khusus</label>
                                <input name="kebutuhan_khusus" type="text" class="form-control" id="kebutuhan_khusus"
                                    value="{{ $alumni->kebutuhan_khusus }}">
                            </div>
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <input name="alamat" type="text" class="form-control" id="alamat"
                                    value="{{ $alumni->alamat }}" required>
                            </div>
                            <div class="form-group">
                                <label for="rt">RT</label>
                                <input name="rt" type="text" class="form-control" id="rt"
                                    value="{{ $alumni->rt }}">
                            </div>
                            <div class="form-group">
                                <label for="rw">RW</label>
                                <input name="rw" type="text" class="form-control" id="rw"
                                    value="{{ $alumni->rw }}">
                            </div>
                            <div class="form-group">
                                <label for="dusun">Dusun</label>
                                <input name="dusun" type="text" class="form-control" id="dusun"
                                    value="{{ $alumni->dusun }}">
                            </div>
                            <div class="form-group">
                                <label for="kelurahan">Kelurahan</label>
                                <input name="kelurahan" type="text" class="form-control" id="kelurahan"
                                    value="{{ $alumni->kelurahan }}" required>
                            </div>
                            <div class="form-group">
                                <label for="kecamatan">Kecamatan</label>
                                <input name="kecamatan" type="text" class="form-control" id="kecamatan"
                                    value="{{ $alumni->kecamatan }}" required>
                            </div>
                            <div class="form-group">
                                <label for="hp">Hand Phone</label>
                                <input name="hp" type="text" class="form-control" id="hp"
                                    value="{{ $alumni->hp }}">
                            </div>

                            <div class="form-group">
                                <label for="e-mail">Email address</label>
                                <input name="e-mail" type="email" class="form-control" id="e-mail"
                                    value="{{ $alumni->{'e-mail'} }}" required>
                            </div>

                            <div class="form-group">
                                <label for="sertifikat_keahlian">Sertifikat</label>
                                <input name="sertifikat_keahlian" type="text" class="form-control"
                                    id="sertifikat_keahlian" value="{{ $alumni->sertifikat_keahlian }}">
                            </div>

                            <div class="form-group">
                                <label for="certificate_image">Gambar Sertifikat</label>
                                <input type="file" class="form-control" id="certificate_image"
                                    name="certificate_image" accept="image/*">
                                @if ($alumni->certificate_image)
                                    <div class="mt-2">
                                        <label>Gambar Sertifikat Saat Ini:</label>
                                        <div class="mb-2">
                                            <img src="{{ url('upload/certificate_images/' . $alumni->certificate_image) }}"
                                                alt="Sertifikat" style="max-width:200px;" class="img-fluid rounded">
                                        </div>
                                    </div>
                                @endif
                            </div>

                            <div class="form-group mt-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="1" id="bekerja"
                                        name="bekerja" {{ $alumni->bekerja ? 'checked' : '' }}>
                                    <label class="form-check-label" for="bekerja">
                                        Sudah Bekerja?
                                    </label>
                                </div>
                            </div>

                            <div id="employment-fields" style="display: {{ $alumni->bekerja ? 'block' : 'none' }};">
                                <div class="form-group">
                                    <label for="kerja_di">Bekerja di (Perusahaan/Instansi)</label>
                                    <input name="kerja_di" type="text" class="form-control" id="kerja_di"
                                        value="{{ $alumni->kerja_di }}" placeholder="Nama Perusahaan">
                                </div>
                                <div class="form-group">
                                    <label for="kerja_mulai">Mulai Bekerja (Tanggal)</label>
                                    <input name="kerja_mulai" type="date" class="form-control" id="kerja_mulai"
                                        value="{{ $alumni->kerja_mulai }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="link_video">Link Video</label>
                                <input name="link_video" type="text" class="form-control" id="link_video"
                                    value="{{ $alumni->link_video }}">
                            </div>
                            <div class="form-group">
                                <label for="keterangan">Keterangan</label>
                                <input name="keterangan" type="text" class="form-control" id="keterangan"
                                    value="{{ $alumni->keterangan }}">
                            </div>
                            <div class="form-group">
                                <label for="asal_sekolah">Asal Sekolah</label>
                                <input name="asal_sekolah" type="text" class="form-control" id="asal_sekolah"
                                    value="{{ $alumni->asal_sekolah }}" required>
                            </div>

                            <div class="form-group">
                                <label for="foto">File Foto</label>
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
                        <h3 class="card-title">Foto Siswa - {{ $alumni->nama_siswa }}</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <div class="card-body">

                        <div class="image text-center ">
                            <img id="showImage"
                                src="{{ isset($alumni->foto) ? url('upload/alumni_images/' . $alumni->foto) : url('upload/noimage.jpg') }}"
                                class="img-circle elevation-2" alt="User Image" height="30%" width="50%">
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
