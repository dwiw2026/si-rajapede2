<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    //
    protected $table = "alumnis";

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
        'e-mail',
        'sertifikat_keahlian',
        'link_video',
        'keterangan',
        'asal_sekolah',
        'foto',
        'bekerja',
        'kerja_di',
        'kerja_mulai',
        'certificate_image'
    ];
}
