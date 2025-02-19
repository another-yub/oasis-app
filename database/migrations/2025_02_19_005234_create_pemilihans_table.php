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
        Schema::create('pemilihans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('siswa_id');
            $table->unsignedBigInteger('kandidat_id');
            $table->timestamp('waktu_memilih');
            $table->foreign('siswa_id')->references('id')->on('siswas');
            $table->foreign('kandidat_id')->references('id')->on('kandidats');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pemilihans');
    }
};
