<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder {
    public function run(){
        DB::table('users')->insert([
            [
                'name'=> Str::random(7),
                'email'=> Str::random(7) . "@" . Str::random(5) . 'ru',
                'age' => rand(18, 65),
                'salary' => rand(3000, 10000),
                'created_at' => date('Y-m-d H:i:s'),
            ],
        ]);
    }
}
