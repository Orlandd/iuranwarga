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
        Schema::table('rukun_tetanggas', function (Blueprint $table) {
            $table->unsignedBigInteger('warga_id')->nullable();
            $table->foreign('warga_id')->references('id')->on('wargas')->onDelete('set null')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('rukun_tetanggas', function (Blueprint $table) {
            //
        });
    }
};
