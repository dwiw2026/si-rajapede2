<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class PesertaDidikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $now = Carbon::now()->toDateTimeString();

        DB::table('peserta_didiks')->insert([
            [
                'nipd' => 'PD1001',
                'nama_siswa' => 'Ahmad Fauzi',
                'jk' => 'L',
                'nisn' => '990011001',
                'tempat_lahir' => 'Jakarta',
                'tanggal_lahir' => '2006-05-12',
                'nik' => '3175010105060001',
                'agama' => 'Islam',
                'alamat' => 'Jl. Merdeka No.1',
                'asal_sekolah' => 'SMP Negeri 1',
                'kelas' => '9A',
                'sudah_magang' => 1,
                'magang_di' => 'CV. Sukses Abadi',
                'magang_mulai' => '2025-07-01',
                'email' => 'ahmad.fauzi@example.com',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nipd' => 'PD1002',
                'nama_siswa' => 'Siti Aminah',
                'jk' => 'P',
                'nisn' => '990011002',
                'tempat_lahir' => 'Bandung',
                'tanggal_lahir' => '2006-08-20',
                'nik' => '3273010208060002',
                'agama' => 'Islam',
                'alamat' => 'Jl. Melati No.2',
                'asal_sekolah' => 'SMP Negeri 2',
                'kelas' => '9B',
                'sudah_magang' => 0,
                'magang_di' => null,
                'magang_mulai' => null,
                'email' => 'siti.aminah@example.com',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nipd' => 'PD1003',
                'nama_siswa' => 'Budi Santoso',
                'jk' => 'L',
                'nisn' => '990011003',
                'tempat_lahir' => 'Surabaya',
                'tanggal_lahir' => '2005-11-03',
                'nik' => '3572010311050003',
                'agama' => 'Kristen',
                'alamat' => 'Jl. Anggrek No.3',
                'asal_sekolah' => 'SMP Negeri 3',
                'kelas' => '9C',
                'sudah_magang' => 1,
                'magang_di' => 'PT. Makmur Jaya',
                'magang_mulai' => '2025-06-15',
                'email' => 'budi.santoso@example.com',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nipd' => 'PD1004',
                'nama_siswa' => 'Dewi Lestari',
                'jk' => 'P',
                'nisn' => '990011004',
                'tempat_lahir' => 'Yogyakarta',
                'tanggal_lahir' => '2006-02-28',
                'nik' => '3472012802060004',
                'agama' => 'Hindu',
                'alamat' => 'Jl. Kenanga No.4',
                'asal_sekolah' => 'SMP Negeri 4',
                'kelas' => '9A',
                'sudah_magang' => 0,
                'magang_di' => null,
                'magang_mulai' => null,
                'email' => 'dewi.lestari@example.com',
                'created_at' => $now,
                'updated_at' => $now,
            ],
            [
                'nipd' => 'PD1005',
                'nama_siswa' => 'Tono Wijaya',
                'jk' => 'L',
                'nisn' => '990011005',
                'tempat_lahir' => 'Medan',
                'tanggal_lahir' => '2005-09-14',
                'nik' => '1272011409050005',
                'agama' => 'Islam',
                'alamat' => 'Jl. Merpati No.5',
                'asal_sekolah' => 'SMP Negeri 5',
                'kelas' => '9B',
                'sudah_magang' => 1,
                'magang_di' => 'Toko Maju Sejahtera',
                'magang_mulai' => '2025-05-20',
                'email' => 'tono.wijaya@example.com',
                'created_at' => $now,
                'updated_at' => $now,
            ],
        ]);
    }
}
