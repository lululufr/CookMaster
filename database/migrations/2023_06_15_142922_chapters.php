<?php

use App\Models\Classes;
use App\Models\Questions;
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
        Schema::create('chapters', function (Blueprint $table) {
            $table->id()->autoIncrement();

            $table->foreignIdFor(Classes::class, 'classes_id')->references('id')->on('classes')->onDelete('cascade');
            $table->string('title')->nullable();
            $table->longText('content')->nullable();
            $table->string('tags')->nullable();
            $table->string('media')->nullable();

            $table->string('type')->default('lecon');



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
