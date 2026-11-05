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
        Schema::table('alumnis', function (Blueprint $table) {
            $table->boolean('bekerja')->default(false)->after('foto');
            $table->string('kerja_di')->nullable()->after('bekerja');
            $table->date('kerja_mulai')->nullable()->after('kerja_di');
            $table->string('certificate_image')->nullable()->after('sertifikat_keahlian');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('alumnis', function (Blueprint $table) {
            $table->dropColumn(['bekerja', 'kerja_di', 'kerja_mulai', 'certificate_image']);
        });
    }
};
