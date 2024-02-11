<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->dateTime('date');
            $table->enum('status',['normal','urgence']);
            $table->foreignid('patient_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
            $table->foreignid('medecin_id')->constrained('users')->onDelete('cascade')->onUpdate('cascade');
         
            $table->timestamps();
            $table->softDeletes();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
