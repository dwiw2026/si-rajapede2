<section id="lowongan">
    <h2 class="mb-4 text-center">Lowongan Pekerjaan</h2>

    <div class="lowongan">
        <div class="container-lg py-3 px-3">
            <div class="row g-3" style="height: 700px;">
                <!-- Column 1: Job List with Scrollbar -->
                <div class="col-md-5">
                    <div class="card h-100 shadow-sm">
                        <div
                            class="card-header bg-light border-bottom d-flex justify-content-between align-items-center">
                            <h6 class="mb-0">
                                <i class="bi bi-briefcase"></i> {{ $lowongans->count() }} Lowongan Tersedia
                            </h6>
                        </div>
                        <div class="card-body p-0" style="overflow-y: auto; max-height: calc(100% - 56px);">
                            @forelse($lowongans as $lowongan)
                                @php
                                    $ld = [
                                        'id' => $lowongan->id,
                                        'judul' => $lowongan->judul,
                                        'perusahaan' => optional($lowongan->perusahaan)->nama,
                                        'lokasi' => $lowongan->lokasi,
                                        'tanggal_posting' => $lowongan->tanggal_posting,
                                        'tanggal_berakhir' => $lowongan->tanggal_berakhir,
                                        'gaji_min' => $lowongan->gaji_min,
                                        'gaji_max' => $lowongan->gaji_max,
                                        'kategori' => $lowongan->kategori_pekerjaan,
                                        'jenis_pekerjaan' => $lowongan->jenis_pekerjaan,
                                        'jenis_kelamin' => $lowongan->jenis_kelamin,
                                        'deskripsi' => $lowongan->deskripsi,
                                        'kriteria' => $lowongan->kriteria_kualifikasi,
                                        'disabilitas' => $lowongan->jenis_disabilitas,
                                    ];
                                @endphp
                                <div class="job-card-list border-bottom p-3 cursor-pointer lowongan-item"
                                    data-lowongan='@json($ld)'
                                    style="cursor: pointer; transition: all 0.3s ease;">
                                    <h6 class="mb-1 fw-bold text-primary">{{ $lowongan->judul }}</h6>
                                    <p class="mb-1 text-muted small">
                                        <strong>{{ optional($lowongan->perusahaan)->nama }}</strong>
                                    </p>
                                    <p class="mb-1 text-secondary small">
                                        <i class="bi bi-geo-alt"></i> {{ $lowongan->lokasi }}
                                    </p>
                                    <p class="mb-0 text-success small">
                                        <i class="bi bi-calendar2"></i>
                                        Berakhir:
                                        {{ \Carbon\Carbon::parse($lowongan->tanggal_berakhir)->format('d M Y') }}
                                    </p>
                                </div>
                            @empty
                                <div class="p-4 text-center text-muted">
                                    <p>Tidak ada lowongan saat ini</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>

                <!-- Column 2: Job Details -->
                <div class="col-md-7">
                    <div class="card h-100 shadow-sm">
                        <div
                            class="card-header bg-primary text-white border-bottom d-flex justify-content-between align-items-center">
                            <h6 class="mb-0"><i class="bi bi-info-circle"></i> Detail Lowongan</h6>
                        </div>
                        <div class="card-body p-0" style="overflow-y: auto; max-height: calc(100% - 56px);">
                            <div id="detail-container" class="p-4">
                                @if ($lowongans->count())
                                    @php $first = $lowongans->first(); @endphp
                                    <h4 class="text-primary fw-bold">{{ $first->judul }}</h4>
                                    <p class="text-muted mb-3">
                                        <strong>{{ optional($first->perusahaan)->nama ?? 'Tidak diketahui' }}</strong>
                                    </p>
                                    <hr>

                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <small class="text-muted d-block">Lokasi</small>
                                            <p class="mb-0"><i class="bi bi-geo-alt"></i> {{ $first->lokasi }}</p>
                                        </div>
                                        <div class="col-6">
                                            <small class="text-muted d-block">Tanggal Posting</small>
                                            <p class="mb-0"><i class="bi bi-calendar"></i>
                                                {{ $first->tanggal_posting ? \Carbon\Carbon::parse($first->tanggal_posting)->format('d/m/Y') : 'Tidak diketahui' }}
                                            </p>
                                        </div>
                                    </div>

                                    <div class="row mb-3">
                                        <div class="col-6">
                                            <small class="text-muted d-block">Berakhir</small>
                                            <p class="mb-0"><i class="bi bi-calendar-check"></i>
                                                {{ $first->tanggal_berakhir ? \Carbon\Carbon::parse($first->tanggal_berakhir)->format('d/m/Y') : 'Tidak diketahui' }}
                                            </p>
                                        </div>
                                        <div class="col-6">
                                            <small class="text-muted d-block">Rentang Gaji</small>
                                            <p class="mb-0"><i class="bi bi-cash-coin"></i>
                                                {{ $first->gaji_min ?? 'Tidak' }} -
                                                {{ $first->gaji_max ?? 'diketahui' }}</p>
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="mb-3">
                                        <span
                                            class="badge bg-info me-2">{{ $first->kategori_pekerjaan ?? 'Kategori' }}</span>
                                        <span class="badge bg-warning">{{ $first->jenis_pekerjaan ?? 'Jenis' }}</span>
                                    </div>

                                    <div class="mb-3">
                                        <small class="text-muted d-block mb-1">Jenis Kelamin</small>
                                        <p class="text-muted small mb-0">
                                            {{ $first->jenis_kelamin ?? 'Tidak ditentukan' }}</p>
                                    </div>

                                    <hr>

                                    <div class="mb-3">
                                        <h6 class="mb-2">Deskripsi Pekerjaan</h6>
                                        <p class="small">{!! nl2br(e($first->deskripsi ?? 'Tidak ada deskripsi')) !!}</p>
                                    </div>

                                    <div class="mb-3">
                                        <h6 class="mb-2">Kriteria Kualifikasi</h6>
                                        <p class="small">{!! nl2br(e($first->kriteria_kualifikasi ?? 'Tidak ada kriteria')) !!}</p>
                                    </div>

                                    <div class="mb-3">
                                        <h6 class="mb-2">Jenis Disabilitas</h6>
                                        <div>
                                            @if ($first->jenis_disabilitas)
                                                @foreach (explode(',', $first->jenis_disabilitas) as $d)
                                                    <span
                                                        class="badge bg-secondary me-2 mb-2">{{ trim($d) }}</span>
                                                @endforeach
                                            @else
                                                <span class="text-muted small">Tidak ditentukan</span>
                                            @endif
                                        </div>
                                    </div>

                                    <hr>

                                    <div class="d-flex gap-2">
                                        <button class="btn btn-primary btn-sm flex-grow-1">
                                            <i class="bi bi-check-circle"></i> Lamar Sekarang
                                        </button>
                                        <button class="btn btn-outline-primary btn-sm flex-grow-1">
                                            <i class="bi bi-share"></i> Bagikan
                                        </button>
                                    </div>
                                @else
                                    <div class="text-center text-muted">
                                        <i class="bi bi-hand-index" style="font-size: 2rem;"></i>
                                        <p class="mt-2">Klik salah satu lowongan di sebelah kiri untuk melihat detail
                                        </p>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style>
        .job-card-list {
            border-left: 4px solid transparent;
            cursor: pointer;
        }

        .job-card-list:hover {
            background-color: #f8f9fa;
            border-left-color: #0d6efd;
        }

        .job-card-list.active {
            background-color: #e7f1ff;
            border-left-color: #0d6efd;
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const jobItems = document.querySelectorAll('.lowongan-item');
            const detailContainer = document.getElementById('detail-container');

            function formatDate(dateString) {
                if (!dateString) return 'Tidak diketahui';
                const date = new Date(dateString);
                return date.toLocaleDateString('id-ID', {
                    day: '2-digit',
                    month: '2-digit',
                    year: 'numeric'
                });
            }

            jobItems.forEach(item => {
                item.addEventListener('click', function() {
                    // Remove active class from all items
                    jobItems.forEach(el => el.classList.remove('active'));
                    // Add active class to clicked item
                    this.classList.add('active');

                    // Extract data from clicked item (defensive parse)
                    let data;
                    try {
                        data = JSON.parse(this.dataset.lowongan);
                    } catch (err) {
                        console.error('Failed to parse lowongan data:', err, this.dataset.lowongan);
                        // Try unescape fallback
                        try {
                            data = JSON.parse(this.dataset.lowongan.replace(/&quot;/g, '"'));
                        } catch (err2) {
                            console.error('Fallback parse failed:', err2);
                            data = {};
                        }
                    }
                    console.log('Lowongan clicked:', data.id || data.judul || 'unknown');

                    // Build detail HTML
                    const detailHTML = `
                        <h4 class="text-primary fw-bold">${data.judul}</h4>
                        <p class="text-muted mb-3">
                            <strong>${data.perusahaan || 'Tidak diketahui'}</strong>
                        </p>
                        <hr>

                        <div class="row mb-3">
                            <div class="col-6">
                                <small class="text-muted d-block">Lokasi</small>
                                <p class="mb-0"><i class="bi bi-geo-alt"></i> ${data.lokasi}</p>
                            </div>
                            <div class="col-6">
                                <small class="text-muted d-block">Tanggal Posting</small>
                                <p class="mb-0"><i class="bi bi-calendar"></i> ${formatDate(data.tanggal_posting)}</p>
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-6">
                                <small class="text-muted d-block">Berakhir</small>
                                <p class="mb-0"><i class="bi bi-calendar-check"></i> ${formatDate(data.tanggal_berakhir)}</p>
                            </div>
                            <div class="col-6">
                                <small class="text-muted d-block">Rentang Gaji</small>
                                <p class="mb-0"><i class="bi bi-cash-coin"></i>
                                    ${data.gaji_min || 'Tidak'} - ${data.gaji_max || 'diketahui'}
                                </p>
                            </div>
                        </div>

                        <hr>

                        <div class="mb-3">
                            <span class="badge bg-info me-2">${data.kategori || 'Kategori'}</span>
                            <span class="badge bg-warning">${data.jenis_pekerjaan || 'Jenis'}</span>
                        </div>

                        <div class="mb-3">
                            <small class="text-muted d-block mb-1">Jenis Kelamin</small>
                            <p class="text-muted small mb-0">${data.jenis_kelamin || 'Tidak ditentukan'}</p>
                        </div>

                        <hr>

                        <div class="mb-3">
                            <h6 class="mb-2">Deskripsi Pekerjaan</h6>
                            <p class="small">${(data.deskripsi || 'Tidak ada deskripsi').replace(/\n/g, '<br>')}</p>
                        </div>

                        <div class="mb-3">
                            <h6 class="mb-2">Kriteria Kualifikasi</h6>
                            <p class="small">${(data.kriteria || 'Tidak ada kriteria').replace(/\n/g, '<br>')}</p>
                        </div>

                        <div class="mb-3">
                            <h6 class="mb-2">Jenis Disabilitas</h6>
                            <div>
                                ${data.disabilitas ?
                                    data.disabilitas.split(',').map(d =>
                                        \`<span class="badge bg-secondary me-2 mb-2">\${d.trim()}</span>\`
                                    ).join('')
                                    : '<span class="text-muted small">Tidak ditentukan</span>'}
                            </div>
                        </div>

                        <hr>

                        <div class="d-flex gap-2">
                            <button class="btn btn-primary btn-sm flex-grow-1">
                                <i class="bi bi-check-circle"></i> Lamar Sekarang
                            </button>
                            <button class="btn btn-outline-primary btn-sm flex-grow-1">
                                <i class="bi bi-share"></i> Bagikan
                            </button>
                        </div>
                    `;

                    detailContainer.innerHTML = detailHTML;
                });
            });

            // Auto-click first item
            if (jobItems.length > 0) {
                jobItems[0].click();
            }
        });
    </script>
</section>
