<?php

namespace Database\Seeders;

use Database\Factories\PostFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
         \App\Models\User::factory(10)->create();
         \App\Models\Post::factory(10)->create();
         \App\Models\AdminUser::factory(1)->create([
             'name'=> "Admin",
             'email' => 'laravel@laravel.com',
             'password' => bcrypt('12345'),
         ]);
    }
}
