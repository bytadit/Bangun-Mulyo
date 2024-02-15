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
        Schema::create('pinjaman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('peminjam_id');
            $table->foreign('peminjam_id')->references('id')->on('peminjams')->onDelete('cascade');
            $table->dateTime('tgl_pinjaman');
            $table->integer('periode_pinjaman');
            $table->bigInteger('jumlah_pinjaman');
            $table->string('keperluan');
            $table->unsignedBigInteger('keterangan')->comment('0: Belum Lunas; 1: Lunas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjamen');
    }
};
