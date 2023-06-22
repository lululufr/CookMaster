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
        Schema::create('contains_ingredients', function (Blueprint $table) {
            $table->id();
            $table->integer('amount');
            $table->string('unit');
            $table->unsignedBigInteger('recipes_id');
            $table->foreign('recipes_id')->references('id')->on('recipes')->onDelete('cascade')->onUpdate('cascade');
            $table->string('ingredients_name');
            $table->foreign('ingredients_name')->references('name')->on('ingredients')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contains_ingredients');
    }
};
