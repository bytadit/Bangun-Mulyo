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
        Schema::create('pinjaman_anggotas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('anggota_id');
            $table->foreign('anggota_id')->references('id')->on('anggota_kelompoks')->onDelete('cascade');
            $table->integer('pinjaman_ke');
            $table->integer('jumlah_pinjaman');
            $table->dateTime('tgl_pinjaman')->nullable();
            $table->dateTime('tgl_pencairan')->nullable();
            $table->dateTime('tgl_pelunasan')->nullable();
            $table->integer('nilai_angsuran');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjaman_anggotas');
    }
};
