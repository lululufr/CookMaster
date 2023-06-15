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
        Schema::create('messages', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('to_id')->index();
            $table->foreign('to_id')->references('id')->on('users')->onDelete('cascade');

            $table->unsignedBigInteger('from_id')->index();
            $table->foreign('from_id')->references('id')->on('users')->onDelete('cascade');

            $table->text('content');

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