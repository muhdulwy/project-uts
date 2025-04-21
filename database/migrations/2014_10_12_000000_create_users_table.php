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
        Schema::create('users', function (Blueprint $table) {
            $table->id('id_user');
            $table->string('name', 225);
            $table->string('password', 225);
            $table->string('email', 225)->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->text('foto_anggota')->nullable();
            $table->enum('role', ['admin', 'anggota', 'user'])->default('user');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
