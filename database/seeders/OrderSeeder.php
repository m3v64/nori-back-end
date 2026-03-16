<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $userIds = DB::table('users')->pluck('id');
        $dishes = DB::table('dishes')->get(['id', 'price']);

        if ($userIds->isEmpty() || $dishes->isEmpty()) {
            return;
        }

        $orderCount = 18;

        for ($i = 1; $i <= $orderCount; $i++) {
            $selectedDishes = $dishes
                ->shuffle()
                ->take(fake()->numberBetween(1, min(4, $dishes->count())));

            $orderId = DB::table('orders')->insertGetId([
                'user_id' => $userIds->random(),
                'title' => 'Order #'.str_pad((string) $i, 4, '0', STR_PAD_LEFT),
                'details' => fake()->optional()->sentence(),
                'placed_at' => fake()->dateTimeBetween('-30 days', 'now'),
                'total_price' => $selectedDishes->sum('price'),
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
