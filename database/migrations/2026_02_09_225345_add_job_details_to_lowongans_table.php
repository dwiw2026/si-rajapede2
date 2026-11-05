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
        Schema::table('lowongans', function (Blueprint $table) {
            $table->date('tanggal_posting')->nullable()->after('judul');
            $table->string('gaji_min')->nullable()->after('tanggal_berakhir');
            $table->string('gaji_max')->nullable()->after('gaji_min');
            $table->string('kategori_pekerjaan')->nullable()->after('gaji_max');
            $table->string('jenis_pekerjaan')->nullable()->after('kategori_pekerjaan');
            $table->text('jenis_kelamin')->nullable()->after('jenis_pekerjaan');
            $table->text('kriteria_kualifikasi')->nullable()->after('jenis_kelamin');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lowongans', function (Blueprint $table) {
            $table->dropColumn(['tanggal_posting', 'gaji_min', 'gaji_max', 'kategori_pekerjaan', 'jenis_pekerjaan', 'jenis_kelamin', 'kriteria_kualifikasi']);
        });
    }
};
