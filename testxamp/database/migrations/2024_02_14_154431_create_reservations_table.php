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
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date')->nullable();
            $table->string('time');
            $table->enum('status',['normal','urgence'])->nullable();
            $table->enum('check',[0,1])->nullable();
            $table->foreignid('patient_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignid('medecin_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};