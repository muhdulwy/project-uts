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
        Schema::create('galeris', function (Blueprint $table) {
            $table->id('id_galeri');
            $table->text('foto_bonsai')->nullable();
            $table->string('nama_bonsai', 225);
            $table->string('nama_latin_bonsai', 225);
            $table->string('ukuran_bonsai', 50)->nullable();
            $table->unsignedBigInteger('id_user');
            $table->text('penghargaan_bonsai')->nullable();
            $table->timestamps();

            $table->foreign('id_user')->references('id_user')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeris');
    }
};
