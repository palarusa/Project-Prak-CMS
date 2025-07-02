<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePenyewaanTable extends Migration
{
    public function up()
    {
        Schema::create('penyewaan', function (Blueprint $table) {
            $table->id();

            // Foreign keys (disesuaikan dengan tabel yang ada)
            $table->unsignedBigInteger('id_pelanggan');
            $table->unsignedBigInteger('id_sepedamotor');
            $table->unsignedBigInteger('id_petugas');

            $table->date('tgl_sewa');
            $table->integer('lama_sewa');
            $table->decimal('total_biaya', 12, 2);

            $table->timestamps();

        });
    }

    public function down()
    {
        Schema::dropIfExists('penyewaan');
    }
};
