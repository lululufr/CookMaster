<?php

use App\Models\User;
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
        Schema::create('classes', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('title');
            $table->string('img')->default('/images/classes/cap-cuisine.jpeg');

            $table->foreignIdFor(User::class, 'chef_id')->references('id')->on('users');
            $table->string('tags')->nullable();
            $table->longText('description');
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
