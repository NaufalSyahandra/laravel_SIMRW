<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data_wargas', function (Blueprint $table) {
            $table->id('id_warga');
            $table->string('NIK', 16)->unique()->nullable();
            $table->string('KK', 16)->unique()->nullable();
            $table->string("nama_depan")->nullable();
            $table->string("nama_belakang")->nullable();
            $table->string("tempat_lahir")->nullable();
            $table->date("tanggal_lahir")->nullable();
            $table->enum("agama", ["Islam", "Kristen", "Katolik", "Hindu", "Budha", "Konghucu"])->nullable();
            $table->enum("status_perkawinan", ["Belum Kawin", "Kawin", "Cerai Hidup", "Cerai Mati", "Kawin Belum Tercatat"])->nullable();
            $table->enum("status_hubungan", ["Kepala Keluarga", "Istri", "Anak"])->nullable();
            $table->string("pekerjaan")->nullable();
            $table->enum("tipe_warga", ["Domisili Lokal", "Non Domisili Lokal"])->default("Domisili Lokal")->nullable();
            $table->enum("jenis_kelamin", ["Laki-laki", "Perempuan"])->nullable();
            $table->enum("golongan_darah", ["A", "B", "AB", "O"])->nullable();
            $table->string("alamat")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_wargas');
    }
};
