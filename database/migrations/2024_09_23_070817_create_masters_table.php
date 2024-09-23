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
        Schema::create('masters', function (Blueprint $table) {
            $table->id();
            $table->string('titleheader');
            $table->text('descriptionheader');
            $table->string('thumbnailheader');
            $table->string('titlefooter');
            $table->text('descriptionfooter');
            $table->text('address');
            $table->string('phone_number');
            $table->string('whatsapp_number');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('masters');
    }
};
