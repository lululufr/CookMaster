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
        Schema::create('event_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('events_id');
            $table->foreign('events_id')->references('id')->on('events')->onDelete('cascade')->onUpdate('cascade');
            $table->string('tag_name');
            $table->foreign('tag_name')->references('name')->on('tags')->onDelete('cascade')->onUpdate('cascade');
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
