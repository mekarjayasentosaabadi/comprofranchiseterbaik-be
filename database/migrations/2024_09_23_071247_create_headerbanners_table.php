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
        Schema::create('headerbanners', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('slug');
            $table->string('banners')->comment('untuk menyimpan nama gambar dan lokasi gambar');
            $table->integer('is_active')->comment('0: Non Active, 1: Active')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('headerbanners');
    }
};
