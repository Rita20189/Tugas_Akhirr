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
            $table->unsignedBigInteger('meja_id');
            $table->integer('total_pesanan')->nullable();
            $table->double('total_harga', 8, 2)->nullable();
            $table->timestamps();

            $table->foreign('meja_id')->references('id')->on('mejas');
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
