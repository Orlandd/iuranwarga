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
        Schema::create('wargas', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('nik')->unique();
            $table->string('kk');
            $table->string('gender');
            $table->string('agama');
            $table->date('tanggalLahir');
            $table->string('tempatLahir');
            $table->unsignedBigInteger('rukun_tetangga_id');
            $table->foreign('rukun_tetangga_id')->references('id')->on('rukun_tetanggas')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wargas');
    }
};
