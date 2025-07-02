<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
    /**
     * Run the migrations.
     */

{
    public function up()
    {
        Schema::create('sepeda_motor', function (Blueprint $table) {
            $table->id();
            $table->string('merek');
            $table->string('plat_nomor')->unique();
            $table->enum('status', ['Tersedia', 'Disewa'])->default('Tersedia');
            $table->decimal('harga_sewa_per_hari', 10, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('sepeda_motor');
    }
};
