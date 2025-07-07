<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class MessagesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        DB::table('messages')->insert([
            [
                'id' => 1,
                'sender_id' => 1,
                'receiver_id' => 2,
                'message_content' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 2,
                'sender_id' => 1,
                'receiver_id' => 3,
                'message_content' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 3,
                'sender_id' => 1,
                'receiver_id' => 4,
                'message_content' => $faker->sentence,
                'created_at' => now(),
                'updated_at' => now()
            ]
            ]);
    }
}
