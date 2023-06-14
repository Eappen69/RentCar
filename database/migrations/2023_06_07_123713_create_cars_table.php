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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('brand');
            $table->string('model');
            $table->string('engine');
            $table->decimal('price_per_day', 8, 2);
            $table->string('image')->nullable();
            $table->string('quantity');
            $table->string('status')->default('available');
            $table->boolean('reserved')->default(true);
            $table->unsignedBigInteger('insu_id')->nullable();
            $table->foreign('insu_id')->references('id')->on('insurances')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cars');
    }
};
