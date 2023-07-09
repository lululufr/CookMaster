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
        Schema::create('cooptation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coopted_id');
            $table->foreign('coopted_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('coopter_id');
            $table->foreign('coopter_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->boolean('hasPaid')->default('0');
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
