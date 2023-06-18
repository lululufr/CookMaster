<?php

use App\Models\Chapters;
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
        Schema::create('questions', function (Blueprint $table) {
            $table->id()->autoIncrement();

            $table->foreignIdFor(Chapters::class, 'chapters_id')->references('id')->on('chapters')->onDelete('cascade');
            $table->string('question');
            $table->longText('reponse');
            $table->string('type')->nullable();

            $table->longText('choix1')->nullable();
            $table->longText('choix2')->nullable();
            $table->longText('choix3')->nullable();
            $table->longText('choix4')->nullable();


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
