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
        Schema::create('murid', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->string('tingkat_pemahaman')->nullable();
            $table->string('nomor_whatsapp');
            $table->date('tgl_lahir');
            $table->string('nik_nisn');
            $table->string('nama_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ibu');
            $table->text('alamat_domisili');
            $table->text('alamat_sekolah');
            $table->string('asal_sekolah');
            $table->string('jadwal')->nullable();
            $table->string('keperluan_khusus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('murid');
    }
};
