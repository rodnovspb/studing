<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder {
    public function run(){
        DB::table('posts')->insert([
            [
                'title'=> Str::random(10),
                'slug'=> Str::random(10),
                'likes'=> rand(0, 30),
            ]
        ]);
    }
}
