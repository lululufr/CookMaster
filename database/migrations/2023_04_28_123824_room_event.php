<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Room;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('room_event', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->date('date');
            $table->time('time_start');
            $table->time('time_end');

            $table->foreignIdFor(Room::class);

            $table->string('title');
            $table->string('tags');
            $table->longText('description');
            $table->string('creator');
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
