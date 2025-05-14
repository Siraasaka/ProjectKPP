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
            $table->string('borrower_name', 255);
            $table->string('nip', 50);
            $table->string('rank', 100);
            $table->string('position', 255);
            $table->string('work_unit', 255);
            $table->text('address')->nullable();
            $table->dateTime('borrow_date');
            $table->dateTime('return_date')->nullable();
            $table->enum('status', ['borrowed', 'returned'])->default('returned');
            $table->text('purpose')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rentals');
    }
};
