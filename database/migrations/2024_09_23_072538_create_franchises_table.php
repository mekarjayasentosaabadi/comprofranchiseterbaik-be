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
        Schema::create('franchises', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('slug');
            $table->string('title');
            $table->text('description');
            $table->string('thumbnail')->comment('untuk penyimpanan gambar dari franchise');
            $table->double('prices')->comment('untuk harga dari franchises');
            $table->double('discount')->comment('untuk pengali discount dengan harga');
            $table->string('contact')->comment('untuk contact whatsapp');
            $table->integer('is_menu')->comment('0: Bukan Menu, 1: Untuk Menu')->default(1);
            $table->integer('is_active')->comment('0: Non Active, 1: Active')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('franchises');
    }
};
