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
        Schema::create('rentals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('vehicle_id')->constrained('vehicles')->onDelete('cascade');
            $table->string('nama_peminjam', 255)->nullable();
            $table->string('nip', 50)->nullable();
            $table->string('pangkat_gol', 100)->nullable();
            $table->string('jabatan', 255)->nullable();
            $table->string('unit_kerja', 255)->nullable();
            $table->text('alamat')->nullable();
            $table->dateTime('tanggal_pinjam')->nullable();
            $table->dateTime('tanggal_kembali')->nullable();
            $table->enum('status_pinjam', ['dipinjam', 'selesai'])->default('selesai');
            $table->text('keperluan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('peminjamen');
    }
};
