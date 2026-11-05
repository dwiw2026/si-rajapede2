<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Lowongan extends Model
{
    //

    use HasFactory;
    protected $fillable = ['perusahaan_id', 'judul', 'tanggal_posting', 'lokasi', 'deskripsi', 'jenis_disabilitas', 'gambar', 'tanggal_berakhir', 'gaji_min', 'gaji_max', 'kategori_pekerjaan', 'jenis_pekerjaan', 'jenis_kelamin', 'kriteria_kualifikasi'];

    public function perusahaan()
    {
        return $this->belongsTo(Perusahaan::class);
    }
}
