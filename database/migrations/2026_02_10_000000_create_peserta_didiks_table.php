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
        Schema::create('peserta_didiks', function (Blueprint $table) {
            $table->id();
            $table->string('nipd')->unique()->nullable();
            $table->string('nama_siswa');
            $table->enum('jk', ['L', 'P'])->nullable();
            $table->string('nisn')->unique()->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('nik')->unique()->nullable();
            $table->string('agama')->nullable();
            $table->string('kebutuhan_khusus')->nullable();
            $table->text('alamat')->nullable();
            $table->string('rt', 3)->nullable();
            $table->string('rw', 3)->nullable();
            $table->string('dusun')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('hp')->nullable();
            $table->string('email')->nullable()->unique();
            $table->string('sertifikat_keahlian')->nullable();
            $table->string('link_video')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('asal_sekolah')->nullable();
            $table->string('foto')->nullable();
            $table->string('kelas')->nullable();

            // internship fields (replaces 'bekerja' semantics)
            $table->boolean('sudah_magang')->default(false);
            $table->string('magang_di')->nullable();
            $table->date('magang_mulai')->nullable();

            $table->string('certificate_image')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peserta_didiks');
    }
};
