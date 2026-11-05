@extends('admin.adminmaster')
@section('admin')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Edit Lowongan Kerja - {{ $lowongan->judul }}</h3>
                    </div>

                    @if ($errors->any())
                        <div class="alert alert-danger m-3">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form method="POST" action="{{ route('lowongan.update', $lowongan->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="card-body">
                            <div class="form-group">
                                <label for="perusahaan_id">Perusahaan <span class="text-danger">*</span></label>
                                <select name="perusahaan_id" id="perusahaan_id"
                                    class="form-control @error('perusahaan_id') is-invalid @enderror" required>
                                    <option value="">-- Pilih Perusahaan --</option>
                                    @foreach ($perusahaans as $p)
                                        <option value="{{ $p->id }}"
                                            {{ old('perusahaan_id', $lowongan->perusahaan_id) == $p->id ? 'selected' : '' }}>
                                            {{ $p->nama }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('perusahaan_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="judul">Judul Lowongan <span class="text-danger">*</span></label>
                                <input type="text" name="judul" id="judul"
                                    class="form-control @error('judul') is-invalid @enderror"
                                    value="{{ old('judul', $lowongan->judul) }}" placeholder="Masukkan judul lowongan"
                                    required>
                                @error('judul')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="tanggal_posting">Tanggal Posting</label>
                                <input type="date" name="tanggal_posting" id="tanggal_posting"
                                    class="form-control @error('tanggal_posting') is-invalid @enderror"
                                    value="{{ old('tanggal_posting', $lowongan->tanggal_posting) }}">
                                @error('tanggal_posting')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="lokasi">Lokasi <span class="text-danger">*</span></label>
                                <input type="text" name="lokasi" id="lokasi"
                                    class="form-control @error('lokasi') is-invalid @enderror"
                                    value="{{ old('lokasi', $lowongan->lokasi) }}"
                                    placeholder="contoh: JAWA TENGAH, BANYUMAS" required>
                                @error('lokasi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="deskripsi">Deskripsi <span class="text-danger">*</span></label>
                                <textarea name="deskripsi" id="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" rows="6"
                                    placeholder="Masukkan deskripsi lowongan" required>{{ old('deskripsi', $lowongan->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="jenis_disabilitas">Jenis Disabilitas <span class="text-danger">*</span></label>
                                @php
                                    $selectedDisabilitas = old(
                                        'jenis_disabilitas',
                                        $lowongan->jenis_disabilitas ? explode(',', $lowongan->jenis_disabilitas) : [],
                                    );
                                @endphp
                                <div id="jenis-disabilitas-group">
                                    <div class="form-check">
                                        <input type="checkbox" name="jenis_disabilitas[]" id="disabilitas_daksa"
                                            value="Disabilitas Daksa" class="form-check-input"
                                            {{ in_array('Disabilitas Daksa', $selectedDisabilitas) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="disabilitas_daksa">Disabilitas Daksa</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="jenis_disabilitas[]" id="disabilitas_rungu"
                                            value="Disabilitas Rungu / Tuli" class="form-check-input"
                                            {{ in_array('Disabilitas Rungu / Tuli', $selectedDisabilitas) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="disabilitas_rungu">Disabilitas Rungu /
                                            Tuli</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="jenis_disabilitas[]" id="disabilitas_netra"
                                            value="Disabilitas Netra" class="form-check-input"
                                            {{ in_array('Disabilitas Netra', $selectedDisabilitas) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="disabilitas_netra">Disabilitas Netra</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="jenis_disabilitas[]" id="disabilitas_intelektual"
                                            value="Disabilitas Intelektual" class="form-check-input"
                                            {{ in_array('Disabilitas Intelektual', $selectedDisabilitas) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="disabilitas_intelektual">Disabilitas
                                            Intelektual</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="jenis_disabilitas[]" id="disabilitas_mental"
                                            value="Disabilitas Mental" class="form-check-input"
                                            {{ in_array('Disabilitas Mental', $selectedDisabilitas) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="disabilitas_mental">Disabilitas
                                            Mental</label>
                                    </div>
                                    <div class="form-check">
                                        <input type="checkbox" name="jenis_disabilitas[]" id="disabilitas_lainnya"
                                            value="Lainnya" class="form-check-input"
                                            {{ in_array('Lainnya', $selectedDisabilitas) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="disabilitas_lainnya">Lainnya</label>
                                    </div>
                                </div>
                                @error('jenis_disabilitas')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label for="tanggal_berakhir">Tanggal Berakhir <span
                                            class="text-danger">*</span></label>
                                    <input type="date" name="tanggal_berakhir" id="tanggal_berakhir"
                                        class="form-control @error('tanggal_berakhir') is-invalid @enderror"
                                        value="{{ old('tanggal_berakhir', $lowongan->tanggal_berakhir) }}" required>
                                    @error('tanggal_berakhir')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="gaji_min">Gaji Minimum</label>
                                    <input type="text" name="gaji_min" id="gaji_min"
                                        class="form-control @error('gaji_min') is-invalid @enderror"
                                        value="{{ old('gaji_min', $lowongan->gaji_min) }}"
                                        placeholder="contoh: 3.000.000">
                                    @error('gaji_min')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="gaji_max">Gaji Maksimum</label>
                                    <input type="text" name="gaji_max" id="gaji_max"
                                        class="form-control @error('gaji_max') is-invalid @enderror"
                                        value="{{ old('gaji_max', $lowongan->gaji_max) }}"
                                        placeholder="contoh: 5.000.000">
                                    @error('gaji_max')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kategori_pekerjaan">Kategori Pekerjaan</label>
                                    <input type="text" name="kategori_pekerjaan" id="kategori_pekerjaan"
                                        class="form-control @error('kategori_pekerjaan') is-invalid @enderror"
                                        value="{{ old('kategori_pekerjaan', $lowongan->kategori_pekerjaan) }}"
                                        placeholder="contoh: Retail & Wholesale Trading">
                                    @error('kategori_pekerjaan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="jenis_pekerjaan">Jenis Pekerjaan</label>
                                    <input type="text" name="jenis_pekerjaan" id="jenis_pekerjaan"
                                        class="form-control @error('jenis_pekerjaan') is-invalid @enderror"
                                        value="{{ old('jenis_pekerjaan', $lowongan->jenis_pekerjaan) }}"
                                        placeholder="contoh: Disabilitas">
                                    @error('jenis_pekerjaan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="jenis_kelamin">Jenis Kelamin</label>
                                    @php
                                        $selectedKelamin = old(
                                            'jenis_kelamin',
                                            $lowongan->jenis_kelamin ? explode(',', $lowongan->jenis_kelamin) : [],
                                        );
                                    @endphp
                                    <div id="jenis-kelamin-group">
                                        <div class="form-check">
                                            <input type="checkbox" name="jenis_kelamin[]" id="kelamin_laki"
                                                value="Laki-laki" class="form-check-input"
                                                {{ in_array('Laki-laki', $selectedKelamin) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="kelamin_laki">Laki-laki</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="checkbox" name="jenis_kelamin[]" id="kelamin_perempuan"
                                                value="Perempuan" class="form-check-input"
                                                {{ in_array('Perempuan', $selectedKelamin) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="kelamin_perempuan">Perempuan</label>
                                        </div>
                                    </div>
                                    @error('jenis_kelamin')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="kriteria_kualifikasi">Kriteria Kualifikasi</label>
                                    <textarea name="kriteria_kualifikasi" id="kriteria_kualifikasi"
                                        class="form-control @error('kriteria_kualifikasi') is-invalid @enderror" rows="4"
                                        placeholder="contoh: Usia 18-28 tahun siap ditempatkan di seluruh area">{{ old('kriteria_kualifikasi', $lowongan->kriteria_kualifikasi) }}</textarea>
                                    @error('kriteria_kualifikasi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="gambar">Gambar</label>
                                    <input type="file" name="gambar" id="gambar"
                                        class="form-control @error('gambar') is-invalid @enderror" accept="image/*">
                                    <small class="text-muted">Format: JPG, JPEG, PNG. Ukuran maksimal: 2MB</small>
                                    @error('gambar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div id="preview" class="mt-2">
                                    @if ($lowongan->gambar)
                                        <label>Gambar Saat Ini:</label>
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $lowongan->gambar) }}" alt="Gambar"
                                                style="max-width: 200px;" class="img-fluid rounded">
                                        </div>
                                    @endif
                                    <img id="gambarPreview" src="" alt="Preview"
                                        style="max-width: 200px; display: none;" class="img-fluid rounded">
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Update</button>
                                <a href="{{ route('lowongan.index') }}" class="btn btn-secondary">Batal</a>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('gambar').addEventListener('change', function(e) {
            const file = e.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const preview = document.getElementById('gambarPreview');
                    preview.src = event.target.result;
                    preview.style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        });
    </script>
@endsection
