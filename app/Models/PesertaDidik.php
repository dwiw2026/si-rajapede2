<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PesertaDidik extends Model
{
    protected $table = 'peserta_didiks';

    protected $fillable = [
        'nipd',
        'nama_siswa',
        'jk',
        'nisn',
        'tempat_lahir',
        'tanggal_lahir',
        'nik',
        'agama',
        'kebutuhan_khusus',
        'alamat',
        'rt',
        'rw',
        'dusun',
        'kelurahan',
        'kecamatan',
        'hp',
        'email',
        'sertifikat_keahlian',
        'link_video',
        'keterangan',
        'asal_sekolah',
        'foto',
        'kelas',
        'sudah_magang',
        'magang_di',
        'magang_mulai',
        'certificate_image'
    ];
}
