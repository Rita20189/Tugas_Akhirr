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
        Schema::create('pesanans', function (Blueprint $table) {
            $table->id();
            $table->string('nama_pelanggan')->nullable();
            $table->unsignedBigInteger('meja_id')->nullable();
            $table->date('tanggal_transaksi')->nullable();
            $table->integer('total_pesanan')->nullable();
            $table->double('total_harga', 8, 2)->nullable();
            $table->timestamps();

            $table->foreign('meja_id')->references('id')->on('mejas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pesanans');
    }
};
