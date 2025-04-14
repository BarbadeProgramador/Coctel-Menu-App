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
        Schema::create('coctel_ingredientes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coctel_id');
            $table->unsignedBigInteger('ingredientes_id');

            // Llaves foráneas
            $table->foreign('coctel_id')->references('id')->on('coctel')->onDelete('cascade');
            $table->foreign('ingredientes_id')->references('id')->on('ingredientes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coctel_ingredientes');
    }
};
