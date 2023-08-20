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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('nama_menu')->nullable();
            $table->double('harga', 8, 2);
            $table->boolean('status')->nullable();
            $table->string('gambar_menu')->nullable();
            $table->unsignedBigInteger('kategori_id');
            $table->unsignedBigInteger('outlet_id');

            $table->foreign('kategori_id')->references('id')->on('kategoris');
            $table->foreign('outlet_id')->references('id')->on('outlets');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
