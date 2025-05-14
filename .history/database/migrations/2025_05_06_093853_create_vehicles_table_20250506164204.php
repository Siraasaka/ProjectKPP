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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->integer('nup')->unique();
            $table->enum('type', ['roda_dua', 'roda_empat']);
            $table->string('brand', 100);
            $table->string('license_plate', 50)->unique();
            $table->string('chassis_number', 100)->unique();
            $table->string('engine_number', 100)->unique();
            $table->year('manufacture_year');
            $table->string('owner_name', 255);
            $table->date('tax_due_date');
            $table->date('stnk_expired');
            $table->enum('status', ['available', 'in_use', 'maintenance'])->default('available');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
