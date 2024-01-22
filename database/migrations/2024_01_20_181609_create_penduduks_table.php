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
        Schema::create('penduduks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('picture')->nullable();
            $table->string('nik')->unique()->nullable();
            $table->string('alamat')->nullable();
            $table->string('telepon')->nullable();
            $table->string('gol_darah')->nullable();
            $table->string('agama')->nullable();
            $table->string('gender')->nullable();
            $table->string('status_nikah')->nullable();
            $table->string('kewarganegaraan')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penduduk');
    }
};
