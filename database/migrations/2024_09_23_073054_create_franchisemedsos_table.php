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
        Schema::create('franchisemedsos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('franchises_id');
            $table->unsignedBigInteger('medsos_id');
            $table->string('medsos_name');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('franchisemedsos');
    }
};
