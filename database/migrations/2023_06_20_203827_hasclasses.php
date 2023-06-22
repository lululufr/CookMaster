<?php

use App\Models\Classes;
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
        Schema::create('hasclasses', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->boolean('bought')->default(false);
            $table->foreignIdFor(Classes::class, 'classes_id')->references('id')->on('classes')->onDelete('cascade');
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
