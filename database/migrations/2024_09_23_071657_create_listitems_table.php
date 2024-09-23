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
        Schema::create('listitems', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('slug');
            $table->text('description');
            $table->string('icons');
            $table->integer('is_active')->comment('0: Non Active, 1: Active')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('listitems');
    }
};
