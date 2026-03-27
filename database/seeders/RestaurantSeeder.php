<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RestaurantSeeder extends Seeder
{
    public function run(): void
    {
        $restaurants = [
            [
                'name' => 'Nori Ramen House',
                'location' => 'Amsterdam Centrum',
                'description' => 'Authentic Japanese ramen crafted with rich, slow-cooked broths and fresh noodles. Our chefs bring the flavors of Tokyo to the heart of Amsterdam.',
                'food_type' => 'Japanese',
                'tags' => 'ramen,noodles,japanese,comfort food',
                'image' => 'restaurants/nori-ramen-house.jpg',
                'rating' => 4.7,
                'delivery_minutes' => 25,
                'delivery_fee' => 299,
            ],
            [
                'name' => 'Sakura Sushi Bar',
                'location' => 'Rotterdam Blaak',
                'description' => 'Premium sushi and sashimi prepared by master sushi chefs using the freshest fish sourced daily from the market.',
                'food_type' => 'Sushi',
                'tags' => 'sushi,sashimi,premium,japanese',
                'image' => 'restaurants/sakura-sushi-bar.jpg',
                'rating' => 4.5,
                'delivery_minutes' => 30,
                'delivery_fee' => 350,
            ],
            [
                'name' => 'Aloha Poke Co.',
                'location' => 'Utrecht Oude Gracht',
                'description' => 'Fresh and vibrant Hawaiian poke bowls with customizable toppings. Healthy, colorful, and bursting with flavor.',
                'food_type' => 'Hawaiian Fusion',
                'tags' => 'poke,healthy,bowls,fresh',
                'image' => 'restaurants/aloha-poke.jpg',
                'rating' => 4.3,
                'delivery_minutes' => 20,
                'delivery_fee' => 199,
            ],
            [
                'name' => 'Izakaya Tanuki',
                'location' => 'Den Haag Centrum',
                'description' => 'Traditional Japanese izakaya serving small plates perfect for sharing. Enjoy yakitori, gyoza, and sake in a cozy atmosphere.',
                'food_type' => 'Izakaya',
                'tags' => 'small plates,shared dining,japanese,yakitori',
                'image' => 'restaurants/izakaya-tanuki.jpg',
                'rating' => 4.8,
                'delivery_minutes' => 35,
                'delivery_fee' => 0,
            ],
            [
                'name' => 'Zen Garden Kitchen',
                'location' => 'Amsterdam Zuid',
                'description' => 'Plant-based Japanese cuisine that proves comfort food can be healthy. Vegan ramen, tofu katsu, and seasonal vegetable tempura.',
                'food_type' => 'Vegan Japanese',
                'tags' => 'vegan,healthy,plant-based,japanese',
                'image' => 'restaurants/zen-garden.jpg',
                'rating' => 4.4,
                'delivery_minutes' => 30,
                'delivery_fee' => 250,
            ],
            [
                'name' => 'Tempura Ten',
                'location' => 'Rotterdam Centrum',
                'description' => 'Specializing in light, crispy tempura using seasonal ingredients. Our signature batter recipe has been perfected over three generations.',
                'food_type' => 'Japanese',
                'tags' => 'tempura,fried,japanese,crispy',
                'image' => 'restaurants/tempura-ten.jpg',
                'rating' => 4.2,
                'delivery_minutes' => 25,
                'delivery_fee' => 299,
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
