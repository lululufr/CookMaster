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
        Schema::create('articles', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('titre');
            $table->string('img');
            $table->integer('prix');
            $table->integer('nb');
            $table->integer('discount')->nullable();
            $table->string('tags')->nullable();
            $table->longText('description');
            $table->longText('lesson');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
