<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ReviewSeeder extends Seeder
{
    public function run(): void
    {
        $userIds = DB::table('users')->pluck('id');
        $restaurantIds = DB::table('restaurants')->pluck('id');

        if ($userIds->isEmpty() || $restaurantIds->isEmpty()) {
            return;
        }

        $messages = [
            'Absolutely loved the food! Fresh ingredients and amazing flavors.',
            'Great portion sizes and quick delivery. Will order again!',
            'The ramen broth was incredibly rich and flavorful.',
            'Decent food but delivery took a bit longer than expected.',
            'Best sushi I have had outside of Japan. Highly recommend!',
            'Good variety on the menu. The gyoza were perfectly crispy.',
            'Average experience. Food was okay but nothing special.',
            'Amazing presentation and taste. Worth every penny.',
            'The tempura was perfectly light and crispy. Excellent!',
            'Friendly service and consistently good quality.',
            'A bit pricey but the quality justifies it completely.',
            'Perfect lunch spot. Quick, fresh, and delicious.',
        ];

        foreach ($userIds as $userId) {
            $reviewCount = fake()->numberBetween(1, 3);

            for ($i = 0; $i < $reviewCount; $i++) {
                DB::table('reviews')->insert([
                    'user_id' => $userId,
                    'restaurant_id' => $restaurantIds->random(),
                    'rating' => fake()->numberBetween(3, 5),
                    'message' => fake()->randomElement($messages),
                    'created_at' => fake()->dateTimeBetween('-60 days', 'now'),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
