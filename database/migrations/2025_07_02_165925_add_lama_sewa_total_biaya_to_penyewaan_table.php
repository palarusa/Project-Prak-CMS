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
    Schema::table('penyewaan', function (Blueprint $table) {
        $table->integer('lama_sewa')->after('tgl_sewa');
        $table->decimal('total_biaya', 12, 2)->after('lama_sewa');
    });
}

public function down(): void
{
    Schema::table('penyewaan', function (Blueprint $table) {
        $table->dropColumn(['lama_sewa', 'total_biaya']);
    });
}

};
