<?php

namespace Database\Seeders;

use App\Models\Lowongan;
use App\Models\Perusahaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LowonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Ambil beberapa perusahaan
        $perusahaans = Perusahaan::inRandomOrder()->limit(8)->get();

        if ($perusahaans->count() == 0) {
            // Jika tidak ada perusahaan, buat dulu
            $perusahaans = [
                Perusahaan::create([
                    'nama' => 'SUMBER ALFARIA TRIJAYA - BRANCH TEGAL',
                    'alamat' => 'Jl. Ahmad Yani No. 123, Tegal, Jawa Tengah',
                    'telepon' => '0283123456',
                    'email' => 'alfaria@example.com'
                ]),
                Perusahaan::create([
                    'nama' => 'TAH SUNG HUNG',
                    'alamat' => 'Jl. Industri No. 456, Brebes, Jawa Tengah',
                    'telepon' => '0284234567',
                    'email' => 'tahsung@example.com'
                ]),
                Perusahaan::create([
                    'nama' => 'NEST BINA BANGSA',
                    'alamat' => 'Jl. Merdeka No. 789, Sukoharjo, Jawa Tengah',
                    'telepon' => '0271345678',
                    'email' => 'nestbina@example.com'
                ]),
                Perusahaan::create([
                    'nama' => 'SANSAN SAUDARATEX JAYA',
                    'alamat' => 'Jl. Industri No. 321, Banyumas, Jawa Tengah',
                    'telepon' => '0281456789',
                    'email' => 'sansan@example.com'
                ]),
                Perusahaan::create([
                    'nama' => 'PEI HAI INT WIRATAMA IND',
                    'alamat' => 'Jl. Gatot Subroto No. 654, Jakarta, DKI',
                    'telepon' => '02187654321',
                    'email' => 'peihai@example.com'
                ]),
            ];
        }

        $lowongans = [
            [
                'perusahaan_id' => $perusahaans[0]->id,
                'judul' => 'CREW STORE',
                'tanggal_posting' => now()->subDays(5),
                'lokasi' => 'JAWA TENGAH, BANYUMAS',
                'deskripsi' => 'SEBAGAI CREW STORE ALFAMART - Kami mencari Crew Store yang berpengalaman untuk bekerja di toko retail kami. Tugas meliputi pelayanan pelanggan, penata barang, dan manajemen inventori.',
                'jenis_disabilitas' => 'Disabilitas Daksa,Disabilitas Rungu / Tuli',
                'tanggal_berakhir' => now()->addDays(30),
                'gaji_min' => '2.500.000',
                'gaji_max' => '3.500.000',
                'kategori_pekerjaan' => 'Retail & Wholesale Trading',
                'jenis_pekerjaan' => 'Disabilitas',
                'jenis_kelamin' => 'Laki-laki,Perempuan',
                'kriteria_kualifikasi' => 'USIA 18-28 TAHUN SIAP DITEMPATKAN DISELURUH AREA BANYUMAS /AREA BRANCH TEGAL',
            ],
            [
                'perusahaan_id' => $perusahaans[1]->id,
                'judul' => 'OPERATOR PRODUKSI',
                'tanggal_posting' => now()->subDays(3),
                'lokasi' => 'JAWA TENGAH, BREBES',
                'deskripsi' => 'Kami membutuhkan Operator Produksi untuk mengoperasikan mesin produksi. Pengalaman minimal 2 tahun di bidang produksi tekstil.',
                'jenis_disabilitas' => 'Disabilitas Daksa,Disabilitas Rungu / Tuli',
                'tanggal_berakhir' => now()->addDays(25),
                'gaji_min' => '3.000.000',
                'gaji_max' => '4.500.000',
                'kategori_pekerjaan' => 'Manufacturing & Processing',
                'jenis_pekerjaan' => 'Tetap',
                'jenis_kelamin' => 'Laki-laki',
                'kriteria_kualifikasi' => 'Usia 20-40 tahun, Pengalaman minimal 2 tahun, Bekerja shift',
            ],
            [
                'perusahaan_id' => $perusahaans[2]->id,
                'judul' => 'TERAPIS REFLEXOLOGY',
                'tanggal_posting' => now()->subDays(2),
                'lokasi' => 'JAWA TENGAH, SUKOHARJO',
                'deskripsi' => 'Posisi Terapis Reflexology untuk memberikan layanan pijat refleksi kepada pelanggan. Perlu sertifikat dan pengalaman minimal 1 tahun.',
                'jenis_disabilitas' => 'Disabilitas Netra,Disabilitas Rungu / Tuli',
                'tanggal_berakhir' => now()->addDays(35),
                'gaji_min' => '2.000.000',
                'gaji_max' => '3.500.000',
                'kategori_pekerjaan' => 'Personal Services & Wellness',
                'jenis_pekerjaan' => 'Kontrak',
                'jenis_kelamin' => 'Laki-laki,Perempuan',
                'kriteria_kualifikasi' => 'Usia 21-35 tahun, Bersertifikat terapis, Pengalaman minimal 1 tahun',
            ],
            [
                'perusahaan_id' => $perusahaans[3]->id,
                'judul' => 'OPERATOR MESIN TEKSTIL',
                'tanggal_posting' => now()->subDays(1),
                'lokasi' => 'JAWA TENGAH, BANYUMAS',
                'deskripsi' => 'Operator untuk menjalankan pabrik tekstil. Kemampuan teknis dan perhatian terhadap detail sangat diperlukan.',
                'jenis_disabilitas' => 'Disabilitas Intelektual,Disabilitas Rungu / Tuli',
                'tanggal_berakhir' => now()->addDays(20),
                'gaji_min' => '3.200.000',
                'gaji_max' => '4.800.000',
                'kategori_pekerjaan' => 'Manufacturing & Processing',
                'jenis_pekerjaan' => 'Tetap',
                'jenis_kelamin' => 'Laki-laki',
                'kriteria_kualifikasi' => 'Usia 22-38 tahun, Mampu bekerja shift, Berkomunikasi efektif',
            ],
            [
                'perusahaan_id' => $perusahaans[4]->id,
                'judul' => 'HANDWORK CRAFTSMAN',
                'tanggal_posting' => now()->subDays(4),
                'lokasi' => 'JAKARTA, PUSAT',
                'deskripsi' => 'Posisi Handwork Craftsman untuk membuat produk kerajinan. Kreativitas dan ketelitian adalah kunci kesuksesan di posisi ini.',
                'jenis_disabilitas' => 'Disabilitas Daksa,Disabilitas Mental',
                'tanggal_berakhir' => now()->addDays(40),
                'gaji_min' => '2.500.000',
                'gaji_max' => '4.000.000',
                'kategori_pekerjaan' => 'Crafts & Artisan',
                'jenis_pekerjaan' => 'Tetap',
                'jenis_kelamin' => 'Laki-laki,Perempuan',
                'kriteria_kualifikasi' => 'Usia 18-35 tahun, Minimal SMA/SMK, Portfolio kerja kerajinan',
            ],
            [
                'perusahaan_id' => $perusahaans[0]->id,
                'judul' => 'ASISTEN TOKO',
                'tanggal_posting' => now()->subDays(6),
                'lokasi' => 'JAWA TENGAH, TEGAL',
                'deskripsi' => 'Asisten Toko untuk membantu operasional toko retail. Bertanggung jawab atas kebersihan, display produk, dan pelayanan pelanggan.',
                'jenis_disabilitas' => 'Disabilitas Rungu / Tuli,Disabilitas Intelektual',
                'tanggal_berakhir' => now()->addDays(28),
                'gaji_min' => '2.300.000',
                'gaji_max' => '3.200.000',
                'kategori_pekerjaan' => 'Retail & Wholesale Trading',
                'jenis_pekerjaan' => 'Tetap',
                'jenis_kelamin' => 'Laki-laki,Perempuan',
                'kriteria_kualifikasi' => 'Usia 18-30 tahun, Minimal SMA, Bersikap ramah dan profesional',
            ],
        ];

        foreach ($lowongans as $lowongan) {
            Lowongan::create($lowongan);
        }
    }
}
