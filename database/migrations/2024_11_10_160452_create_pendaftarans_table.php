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
        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('email');
            $table->string('username');
            $table->string('password');
            $table->string('nomor_whatsapp');
            $table->date('tgl_lahir');
            $table->string('nik_nisn');
            $table->string('asal_sekolah');
            $table->string('nama_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ibu');
            $table->string('alamat_domisili');
            $table->string('alamat_sekolah');
            $table->string('jadwal');
            $table->string('atas_nama_rekening')->nullable();
            $table->string('nomor_rekening')->nullable();
            $table->string('nominal_pembayaran')->nullable();
            $table->string('bukti_pembayaran')->nullable();
            $table->string('keperluan_khusus')->nullable();
            $table->boolean('status')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};
