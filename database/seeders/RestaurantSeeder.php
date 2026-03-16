<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $restaurants = [
            [
                'location' => 'Amsterdam Centrum',
                'description' => 'Japanese comfort food with a modern twist.',
                'food_type' => 'Japanese',
                'tags' => 'ramen,sushi,casual',
            ],
            [
                'location' => 'Rotterdam Blaak',
                'description' => 'Fresh poke bowls and healthy fusion dishes.',
                'food_type' => 'Hawaiian Fusion',
                'tags' => 'poke,healthy,quick',
            ],
            [
                'location' => 'Utrecht Oude Gracht',
                'description' => 'Traditional izakaya style small plates.',
                'food_type' => 'Izakaya',
                'tags' => 'shared-dining,tapas,japanese',
            ],
            [
                'location' => 'Den Haag Centrum',
                'description' => 'Premium sushi and omakase specials.',
                'food_type' => 'Sushi',
                'tags' => 'premium,sushi,omakase',
            ],
        ];

        foreach ($restaurants as $restaurant) {
            DB::table('restaurants')->insert([
                ...$restaurant,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
