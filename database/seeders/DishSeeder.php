<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DishSeeder extends Seeder
{
    public function run(): void
    {
        $restaurantIds = DB::table('restaurants')->pluck('id', 'name');

        if ($restaurantIds->isEmpty()) {
            return;
        }

        $dishesByRestaurant = [
            'Nori Ramen House' => [
                ['name' => 'Tonkotsu Ramen', 'description' => 'Rich pork bone broth with chashu pork, ajitama egg, nori, and scallions.', 'ingredients' => 'pork broth, chashu pork, ramen noodles, soft-boiled egg, nori, scallions', 'allergies' => 'gluten,soy,eggs', 'price' => 1490, 'image' => 'dishes/tonkotsu-ramen.jpg'],
                ['name' => 'Spicy Miso Ramen', 'description' => 'Hearty miso broth with a spicy kick, topped with ground pork and corn.', 'ingredients' => 'miso broth, ground pork, ramen noodles, corn, bean sprouts, chili oil', 'allergies' => 'gluten,soy', 'price' => 1390, 'image' => 'dishes/spicy-miso-ramen.jpg'],
                ['name' => 'Chicken Karaage', 'description' => 'Crispy Japanese fried chicken served with yuzu mayo.', 'ingredients' => 'chicken thigh, potato starch, ginger, garlic, soy sauce, yuzu mayo', 'allergies' => 'gluten,soy,eggs', 'price' => 890, 'image' => 'dishes/chicken-karaage.jpg'],
                ['name' => 'Yasai Gyoza', 'description' => 'Pan-fried vegetable dumplings with dipping sauce.', 'ingredients' => 'cabbage, chives, mushrooms, gyoza wrapper, sesame oil', 'allergies' => 'gluten,sesame', 'price' => 750, 'image' => 'dishes/yasai-gyoza.jpg'],
                ['name' => 'Edamame', 'description' => 'Steamed young soybeans lightly salted.', 'ingredients' => 'edamame, sea salt', 'allergies' => 'soy', 'price' => 490, 'image' => 'dishes/edamame.jpg'],
                ['name' => 'Matcha Cheesecake', 'description' => 'Creamy Japanese-style cheesecake with matcha green tea.', 'ingredients' => 'cream cheese, matcha powder, sugar, eggs, butter, biscuit base', 'allergies' => 'dairy,gluten,eggs', 'price' => 690, 'image' => 'dishes/matcha-cheesecake.jpg'],
            ],
            'Sakura Sushi Bar' => [
                ['name' => 'Dragon Roll', 'description' => 'Shrimp tempura roll topped with avocado and eel sauce.', 'ingredients' => 'shrimp tempura, avocado, rice, nori, eel sauce, sesame seeds', 'allergies' => 'shellfish,gluten,sesame', 'price' => 1690, 'image' => 'dishes/dragon-roll.jpg'],
                ['name' => 'Salmon Nigiri Set', 'description' => 'Six pieces of fresh salmon over pressed sushi rice.', 'ingredients' => 'fresh salmon, sushi rice, wasabi', 'allergies' => 'fish', 'price' => 1290, 'image' => 'dishes/salmon-nigiri.jpg'],
                ['name' => 'Tuna Sashimi', 'description' => 'Eight slices of premium bluefin tuna.', 'ingredients' => 'bluefin tuna, daikon, shiso leaf', 'allergies' => 'fish', 'price' => 1890, 'image' => 'dishes/tuna-sashimi.jpg'],
                ['name' => 'California Roll', 'description' => 'Classic crab and avocado roll with cucumber.', 'ingredients' => 'crab stick, avocado, cucumber, rice, nori, mayo', 'allergies' => 'shellfish,eggs', 'price' => 990, 'image' => 'dishes/california-roll.jpg'],
                ['name' => 'Miso Soup', 'description' => 'Traditional Japanese miso soup with tofu and wakame.', 'ingredients' => 'miso paste, tofu, wakame, dashi, scallions', 'allergies' => 'soy,fish', 'price' => 390, 'image' => 'dishes/miso-soup.jpg'],
            ],
            'Aloha Poke Co.' => [
                ['name' => 'Classic Ahi Poke Bowl', 'description' => 'Fresh ahi tuna on sushi rice with traditional poke seasoning.', 'ingredients' => 'ahi tuna, sushi rice, sesame oil, soy sauce, scallions, sesame seeds', 'allergies' => 'fish,soy,sesame', 'price' => 1390, 'image' => 'dishes/ahi-poke.jpg'],
                ['name' => 'Salmon Avocado Bowl', 'description' => 'Norwegian salmon with ripe avocado, mango, and spicy mayo.', 'ingredients' => 'salmon, avocado, mango, spicy mayo, rice, edamame', 'allergies' => 'fish,soy,eggs', 'price' => 1490, 'image' => 'dishes/salmon-avocado-bowl.jpg'],
                ['name' => 'Tofu Zen Bowl', 'description' => 'Marinated crispy tofu with mixed greens and ponzu dressing.', 'ingredients' => 'crispy tofu, mixed greens, cucumber, carrot, ponzu, rice', 'allergies' => 'soy,gluten', 'price' => 1190, 'image' => 'dishes/tofu-zen-bowl.jpg'],
                ['name' => 'Tropical Shrimp Bowl', 'description' => 'Grilled shrimp with pineapple salsa and coconut rice.', 'ingredients' => 'grilled shrimp, pineapple, coconut rice, avocado, cilantro', 'allergies' => 'shellfish', 'price' => 1490, 'image' => 'dishes/tropical-shrimp-bowl.jpg'],
            ],
            'Izakaya Tanuki' => [
                ['name' => 'Yakitori Platter', 'description' => 'Assorted grilled chicken skewers with tare and shio seasoning.', 'ingredients' => 'chicken thigh, chicken skin, scallion, tare sauce, sea salt', 'allergies' => 'soy', 'price' => 1290, 'image' => 'dishes/yakitori-platter.jpg'],
                ['name' => 'Takoyaki', 'description' => 'Crispy octopus balls topped with bonito flakes and takoyaki sauce.', 'ingredients' => 'octopus, batter, bonito flakes, takoyaki sauce, mayo, aonori', 'allergies' => 'gluten,eggs,fish', 'price' => 850, 'image' => 'dishes/takoyaki.jpg'],
                ['name' => 'Beef Teriyaki', 'description' => 'Tender sliced beef glazed in homemade teriyaki sauce.', 'ingredients' => 'beef sirloin, teriyaki sauce, steamed rice, broccoli', 'allergies' => 'soy,gluten', 'price' => 1690, 'image' => 'dishes/beef-teriyaki.jpg'],
                ['name' => 'Agedashi Tofu', 'description' => 'Lightly fried tofu in warm dashi broth.', 'ingredients' => 'silken tofu, dashi, soy sauce, mirin, grated daikon, ginger', 'allergies' => 'soy,gluten,fish', 'price' => 790, 'image' => 'dishes/agedashi-tofu.jpg'],
                ['name' => 'Unagi Don', 'description' => 'Grilled freshwater eel over rice with sweet kabayaki sauce.', 'ingredients' => 'eel, rice, kabayaki sauce, pickled ginger, nori', 'allergies' => 'fish,soy,gluten', 'price' => 1990, 'image' => 'dishes/unagi-don.jpg'],
                ['name' => 'Japanese Curry Rice', 'description' => 'Rich and savory Japanese curry with tender vegetables and rice.', 'ingredients' => 'curry roux, potato, carrot, onion, rice, fukujinzuke', 'allergies' => 'gluten,dairy', 'price' => 1190, 'image' => 'dishes/japanese-curry.jpg'],
            ],
            'Zen Garden Kitchen' => [
                ['name' => 'Vegan Tantanmen', 'description' => 'Creamy sesame and chili ramen with crumbled tofu and bok choy.', 'ingredients' => 'sesame broth, ramen noodles, crumbled tofu, bok choy, chili oil', 'allergies' => 'gluten,sesame,soy', 'price' => 1390, 'image' => 'dishes/vegan-tantanmen.jpg'],
                ['name' => 'Tofu Katsu Curry', 'description' => 'Crispy breaded tofu cutlet with Japanese curry sauce and rice.', 'ingredients' => 'tofu, panko breadcrumbs, curry sauce, rice, pickles', 'allergies' => 'gluten,soy', 'price' => 1290, 'image' => 'dishes/tofu-katsu.jpg'],
                ['name' => 'Vegetable Tempura', 'description' => 'Seasonal vegetables in a light, crispy tempura batter.', 'ingredients' => 'sweet potato, eggplant, shiso, green beans, tempura batter', 'allergies' => 'gluten', 'price' => 990, 'image' => 'dishes/vegetable-tempura.jpg'],
                ['name' => 'Mushroom Donburi', 'description' => 'Mixed mushrooms simmered in dashi broth over rice.', 'ingredients' => 'shiitake, enoki, oyster mushrooms, dashi, rice, scallions', 'allergies' => 'soy', 'price' => 1190, 'image' => 'dishes/mushroom-donburi.jpg'],
            ],
            'Tempura Ten' => [
                ['name' => 'Signature Tempura Set', 'description' => 'Chef\'s selection of prawn and seasonal vegetable tempura.', 'ingredients' => 'tiger prawns, sweet potato, lotus root, shiso, tempura batter, tentsuyu', 'allergies' => 'shellfish,gluten', 'price' => 1890, 'image' => 'dishes/signature-tempura.jpg'],
                ['name' => 'Tempura Udon', 'description' => 'Thick udon noodles in hot dashi broth with shrimp tempura.', 'ingredients' => 'udon noodles, dashi broth, shrimp tempura, scallions, kamaboko', 'allergies' => 'shellfish,gluten,fish', 'price' => 1490, 'image' => 'dishes/tempura-udon.jpg'],
                ['name' => 'Tendon', 'description' => 'Prawn and vegetable tempura over rice with sweet tare sauce.', 'ingredients' => 'prawns, rice, sweet potato, green pepper, tare sauce', 'allergies' => 'shellfish,gluten,soy', 'price' => 1590, 'image' => 'dishes/tendon.jpg'],
                ['name' => 'Kakiage', 'description' => 'Crispy mixed vegetable and shrimp tempura fritter.', 'ingredients' => 'shrimp, onion, carrot, burdock root, tempura batter', 'allergies' => 'shellfish,gluten', 'price' => 890, 'image' => 'dishes/kakiage.jpg'],
            ],
        ];

        foreach ($dishesByRestaurant as $restaurantName => $dishes) {
            $restaurantId = $restaurantIds->get($restaurantName);

            if (! $restaurantId) {
                continue;
            }

            foreach ($dishes as $dish) {
                DB::table('dishes')->insert([
                    'restaurant_id' => $restaurantId,
                    ...$dish,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
