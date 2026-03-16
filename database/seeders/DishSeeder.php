<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DishSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurantIds = DB::table('restaurants')->pluck('id');

        if ($restaurantIds->isEmpty()) {
            return;
        }

        $dishNames = [
            'Spicy Miso Ramen',
            'Salmon Poke Bowl',
            'Chicken Karaage',
            'Dragon Roll',
            'Beef Teriyaki',
            'Tofu Katsu Curry',
            'Tempura Udon',
            'Yasai Gyoza',
            'Unagi Don',
            'Matcha Cheesecake',
        ];

        foreach ($restaurantIds as $restaurantId) {
            $count = fake()->numberBetween(7, 17);

            for ($i = 0; $i < $count; $i++) {
                DB::table('dishes')->insert([
                    'restaurant_id' => $restaurantId,
                    'name' => fake()->randomElement($dishNames),
                    'ingredients' => implode(', ', fake()->words(fake()->numberBetween(4, 7))),
                    'allergies' => fake()->optional()->randomElement([
                        'gluten,soy',
                        'fish,sesame',
                        'eggs,wheat',
                        'nuts',
                    ]),
                    'price' => fake()->numberBetween(850, 2490),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
