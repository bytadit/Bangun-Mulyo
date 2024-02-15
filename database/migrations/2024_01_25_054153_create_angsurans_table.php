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
        Schema::create('angsurans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pinjaman_anggota_id');
            $table->foreign('pinjaman_anggota_id')->references('id')->on('pinjaman_anggotas')->onDelete('cascade');
            $table->dateTime('tgl_angsuran');
            $table->float('bunga');
            $table->integer('pokok_dibayar');
            $table->integer('pokok_tunggakan');
            $table->integer('pokok_sisa');
            $table->string('keterangan');
            // $table->integer('jasa/bulan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('angsurans');
    }
};
