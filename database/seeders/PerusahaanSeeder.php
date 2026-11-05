<?php

namespace Database\Seeders;

use App\Models\Perusahaan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PerusahaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $perusahaans = [
            [
                'nama' => 'SUMBER ALFARIA TRIJAYA - BRANCH TEGAL',
                'alamat' => 'Jl. Ahmad Yani No. 123, Tegal, Jawa Tengah',
                'telepon' => '0283123456',
                'email' => 'alfaria.tegal@example.com'
            ],
            [
                'nama' => 'TAH SUNG HUNG',
                'alamat' => 'Jl. Industri No. 456, Brebes, Jawa Tengah',
                'telepon' => '0284234567',
                'email' => 'tahsung@example.com'
            ],
            [
                'nama' => 'NEST BINA BANGSA',
                'alamat' => 'Jl. Merdeka No. 789, Sukoharjo, Jawa Tengah',
                'telepon' => '0271345678',
                'email' => 'nestbina@example.com'
            ],
            [
                'nama' => 'SANSAN SAUDARATEX JAYA',
                'alamat' => 'Jl. Industri No. 321, Banyumas, Jawa Tengah',
                'telepon' => '0281456789',
                'email' => 'sansan@example.com'
            ],
            [
                'nama' => 'PEI HAI INT WIRATAMA IND',
                'alamat' => 'Jl. Gatot Subroto No. 654, Jakarta, DKI',
                'telepon' => '02187654321',
                'email' => 'peihai@example.com'
            ],
            [
                'nama' => 'SUMBER ALFARIA TRIJAYA - BRANCH KLATEN',
                'alamat' => 'Jl. Pemuda No. 234, Klaten, Jawa Tengah',
                'telepon' => '0272334455',
                'email' => 'alfaria.klaten@example.com'
            ],
            [
                'nama' => 'CV KARYA MANDIRI',
                'alamat' => 'Jl. Sudirman No. 567, Semarang, Jawa Tengah',
                'telepon' => '0288445566',
                'email' => 'karya.mandiri@example.com'
            ],
            [
                'nama' => 'PT SEJATI JAYA INDUSTRI',
                'alamat' => 'Jl. Diponegoro No. 890, Yogyakarta, Daerah Istimewa',
                'telepon' => '0274556677',
                'email' => 'sejati@example.com'
            ],
        ];

        foreach ($perusahaans as $perusahaan) {
            Perusahaan::create($perusahaan);
        }
    }
}
