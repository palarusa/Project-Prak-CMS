<?php

use Database\Seeders\PetugasSeeder;
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
        Schema::create('petugas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('no_telepon')->unique();
            $table->string('alamat');
            $table->timestamps();
        });
    }
    
    public function down(): void
    {
        Schema::dropIfExists('petugas');
    }
};
