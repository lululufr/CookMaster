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
        Schema::create('users', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('username')->unique();
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('theme')->default('dracula');
            $table->string('langue')->default('Francais');
            $table->string('profil_picture')->default('/images/profil_pictures/default_profil_picture.png');
            $table->string('role')->default('admin');
            $table->string('buying_plan')->default('free');
            $table->integer('nb_classes')->default('0');
            $table->dateTime('time_nb_classes')->default(today());
            $table->integer('cooptation_count')->default('0');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
