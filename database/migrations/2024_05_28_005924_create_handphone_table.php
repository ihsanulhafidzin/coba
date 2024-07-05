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
        Schema::create('handphone', function (Blueprint $table) {
            $table->id();
            $table->string('merek');
            $table->string('warna');
            $table->integer('ram');
            $table->integer('harga');
            $table->unsignedBigInteger('type');
            $table->foreign('type')->references('id')->on('tipes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('handphone');
    }
};
