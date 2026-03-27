<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    public function run(): void
    {
        $userIds = DB::table('users')->pluck('id');
        $restaurants = DB::table('restaurants')->pluck('id');

        if ($userIds->isEmpty() || $restaurants->isEmpty()) {
            return;
        }

        $statuses = ['pending', 'confirmed', 'preparing', 'delivering', 'delivered', 'cancelled'];

        for ($i = 1; $i <= 18; $i++) {
            $restaurantId = $restaurants->random();
            $dishes = DB::table('dishes')
                ->where('restaurant_id', $restaurantId)
                ->get(['id', 'price']);

            if ($dishes->isEmpty()) {
                continue;
            }

            $selectedDishes = $dishes
                ->shuffle()
                ->take(fake()->numberBetween(1, min(4, $dishes->count())));

            $orderId = DB::table('orders')->insertGetId([
                'user_id' => $userIds->random(),
                'restaurant_id' => $restaurantId,
                'title' => 'Order #'.str_pad((string) $i, 4, '0', STR_PAD_LEFT),
                'details' => fake()->optional()->sentence(),
                'placed_at' => fake()->dateTimeBetween('-30 days', 'now'),
                'total_price' => $selectedDishes->sum('price'),
                'status' => fake()->randomElement($statuses),
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            $pivotRows = $selectedDishes
                ->map(fn ($dish) => [
                    'order_id' => $orderId,
                    'dish_id' => $dish->id,
                ])
                ->values()
                ->all();

            DB::table('dish_order')->insert($pivotRows);
        }
    }
}
