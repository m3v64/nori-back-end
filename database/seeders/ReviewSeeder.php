<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = DB::table('users')->pluck('id');

        if ($userIds->isEmpty()) {
            return;
        }

        foreach ($userIds as $userId) {
            $reviewCount = fake()->numberBetween(1, 3);

            for ($i = 0; $i < $reviewCount; $i++) {
                DB::table('reviews')->insert([
                    'user_id' => $userId,
                    'rating' => fake()->numberBetween(1, 5),
                    'message' => fake()->sentence(fake()->numberBetween(8, 16)),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
