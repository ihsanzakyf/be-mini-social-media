<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        DB::table('posts')->insert([
            [
            'user_id' => 1,
            'content' => $faker->paragraph,
            'image_url' => $faker->imageUrl(640, 480, 'nature', true, 'Faker'),
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'user_id' => 2,
            'content' => $faker->paragraph,
            'image_url' => $faker->imageUrl(640, 480, 'nature', true, 'Faker'),
            'created_at' => now(),
            'updated_at' => now(),
            ],
            [
            'user_id' => 3,
            'content' => $faker->paragraph,
            'image_url' => $faker->imageUrl(640, 480, 'nature', true, 'Faker'),
            'created_at' => now(),
            'updated_at' => now(),
            ]
            
        ]);
    }
}
