<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    //
    protected $fillable = [
        'npsn',
        'nama',
        'alamat',
        'kota',
        'provinsi',
        'email',
        'telepon',
    ];

    // $table->id();
    // $table->string('npsn')->unique();
    // $table->string('nama');
    // $table->string('alamat');
    // $table->string('kota');
    // $table->string('provinsi');
    // $table->string('email')->nullable();
    // $table->string('telepon')->nullable();
    // $table->timestamps();

}
