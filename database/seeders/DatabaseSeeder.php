<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Event;
use App\Models\Posts;
use App\Models\Rooms;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
         //User::factory(10)->create();
/*
         \App\Models\User::factory()->create([
             'username' => 'Test User',
             'email' => 'test@example.com',
             'password' => 'test!',
             'theme' => 'dracula',
             'created_at' => now()
         ]); */


        User::factory()
            ->count(50)
            ->create();

        Posts::factory()
            ->count(50)
            ->create();

        Rooms::factory()
            ->count(50)
            ->create();

        Event::factory()
            ->count(50)
            ->create();



    }
}
