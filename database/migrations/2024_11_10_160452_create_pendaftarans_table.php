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
            $table->enum('tingkat_pendidikan', ['SD', 'SMP', 'SMA', 'D1', 'D2', 'D3', 'D4', 'S1', 'S2', 'S3']);
            $table->string('nik_nisn');
            $table->string('nama_ayah');
            $table->string('pekerjaan_ayah');
            $table->string('nama_ibu');
            $table->string('pekerjaan_ibu');
            $table->text('alamat_domisili');
            $table->text('alamat_sekolah');
            $table->string('asal_sekolah');
            $table->string('jadwal')->nullable();
            $table->string('nomor_rekening_pengirim');
            $table->string('atas_nama_rekening_pengirim');
            $table->string('nominal_pembayaran');
            $table->string('jenis_pembayaran');
            $table->string('rekening_tujuan');
            $table->string('bukti_pembayaran');
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
