<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('alumnis', function (Blueprint $table) {
            $table->id();
            $table->string('nipd')->unique();
            $table->string('nama_siswa');
            $table->enum('jk', ['L', 'P']);
            $table->string('nisn')->unique();
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');
            $table->string('nik')->unique();
            $table->string('agama');
            $table->string('kebutuhan_khusus')->nullable();
            $table->text('alamat');
            $table->string('rt', 3)->nullable();
            $table->string('rw', 3)->nullable();
            $table->string('dusun')->nullable();
            $table->string('kelurahan');
            $table->string('kecamatan');
            $table->string('hp')->nullable();
            $table->string('e-mail')->unique();
            $table->string('sertifikat_keahlian')->nullable();
            $table->string('link_video')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('asal_sekolah');
            $table->string('foto')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumnis');
    }
};
