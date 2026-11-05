<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AlumniSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now()->toDateTimeString();

        DB::table('alumnis')->insert([
            [
                'nipd' => 'AL001',
                'nama_siswa' => 'Budi Santoso',
                'jk' => 'L',
                'nisn' => '991001001',
                'tempat_lahir' => 'Mojokerto',
                'tanggal_lahir' => '2005-03-15',
                'nik' => '3515010315050001',
                'agama' => 'Islam',
                'kebutuhan_khusus' => 'Autisme',
                'alamat' => 'Jl. Raya Mojokerto No.15',
                'rt' => '01',
                'rw' => '02',
                'dusun' => 'Kembar',
                'kelurahan' => 'Kembar',
                'kecamatan' => 'Mojokerto',
                'hp' => '089876543210',
                'e-mail' => 'budi.santoso@example.com',
                'sertifikat_keahlian' => null,
                'link_video' => null,
                'keterangan' => 'Lulusan SMA tahun 2025',
                'asal_sekolah' => 'SLB Pertiwi Mojokerto',
                'foto' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nipd' => 'AL002',
                'nama_siswa' => 'Siti Nurhaliza',
                'jk' => 'P',
                'nisn' => '991001002',
                'tempat_lahir' => 'Mojokerto',
                'tanggal_lahir' => '2005-07-22',
                'nik' => '3515010722050002',
                'agama' => 'Islam',
                'kebutuhan_khusus' => 'Tunarungu',
                'alamat' => 'Jl. Diponegoro No.42',
                'rt' => '03',
                'rw' => '01',
                'dusun' => 'Prajurit',
                'kelurahan' => 'Prajurit',
                'kecamatan' => 'Mojokerto',
                'hp' => '088765432109',
                'e-mail' => 'siti.nurhaliza@example.com',
                'sertifikat_keahlian' => null,
                'link_video' => null,
                'keterangan' => 'Lulusan SMA tahun 2025',
                'asal_sekolah' => 'SLB Pertiwi Mojokerto',
                'foto' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nipd' => 'AL003',
                'nama_siswa' => 'Ahmad Ridho',
                'jk' => 'L',
                'nisn' => '991001003',
                'tempat_lahir' => 'Mojokerto',
                'tanggal_lahir' => '2005-11-08',
                'nik' => '3515011108050003',
                'agama' => 'Islam',
                'kebutuhan_khusus' => 'Tunanetra',
                'alamat' => 'Jl. Ahmad Yani No.28',
                'rt' => '02',
                'rw' => '03',
                'dusun' => 'Karangrejo',
                'kelurahan' => 'Karangrejo',
                'kecamatan' => 'Mojokerto',
                'hp' => '087654321098',
                'e-mail' => 'ahmad.ridho@example.com',
                'sertifikat_keahlian' => null,
                'link_video' => null,
                'keterangan' => 'Lulusan SMA tahun 2025',
                'asal_sekolah' => 'SLB Pertiwi Mojokerto',
                'foto' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nipd' => 'AL004',
                'nama_siswa' => 'Dewi Farida',
                'jk' => 'P',
                'nisn' => '991001004',
                'tempat_lahir' => 'Mojokerto',
                'tanggal_lahir' => '2005-05-19',
                'nik' => '3515010519050004',
                'agama' => 'Islam',
                'kebutuhan_khusus' => 'Tunadaksa',
                'alamat' => 'Jl. Merdeka No.35',
                'rt' => '04',
                'rw' => '02',
                'dusun' => 'Sumobito',
                'kelurahan' => 'Sumobito',
                'kecamatan' => 'Mojokerto',
                'hp' => '086543210987',
                'e-mail' => 'dewi.farida@example.com',
                'sertifikat_keahlian' => null,
                'link_video' => null,
                'keterangan' => 'Lulusan SMA tahun 2025',
                'asal_sekolah' => 'SLB Pertiwi Mojokerto',
                'foto' => null,
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
