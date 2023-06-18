<?php

use App\Models\Rooms;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.id
     */
    public function up(): void
    {
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description');
            $table->bigInteger('rooms_id')->unsigned()->index()->nullable();
            $table->foreign('rooms_id')->references('id')->on('rooms')->onDelete('cascade')->onUpdate('cascade');
            $table->string('tags')->nullable(); // a lier au tags
            $table->dateTime('start');
            $table->integer('duration');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
