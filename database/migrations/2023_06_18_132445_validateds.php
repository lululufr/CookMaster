<?php

use App\Models\Chapters;
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
        Schema::create('validateds', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->boolean('validated')->default(false);
            $table->foreignIdFor(Chapters::class, 'chapters_id')->references('id')->on('chapters')->onDelete('cascade');
            $table->foreignIdFor(User::class, 'user_id')->references('id')->on('users')->onDelete('cascade');
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
