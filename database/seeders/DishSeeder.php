<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DishSeeder extends Seeder
{
    public function run(): void
    {
        $dishes = [
            ['name' => 'Tonkotsu Ramen', 'category' => 'Ramen', 'description' => 'Rich pork bone broth with chashu pork, ajitama egg, nori, and scallions.', 'ingredients' => 'pork broth, chashu pork, ramen noodles, soft-boiled egg, nori, scallions', 'allergies' => 'gluten,soy,eggs', 'price' => 1490, 'image' => 'dishes/tonkotsu-ramen.jpg'],
            ['name' => 'Spicy Miso Ramen', 'category' => 'Ramen', 'description' => 'Hearty miso broth with a spicy kick, topped with ground pork and corn.', 'ingredients' => 'miso broth, ground pork, ramen noodles, corn, bean sprouts, chili oil', 'allergies' => 'gluten,soy', 'price' => 1390, 'image' => 'dishes/spicy-miso-ramen.jpg'],
            ['name' => 'Vegan Tantanmen', 'category' => 'Ramen', 'description' => 'Creamy sesame and chili ramen with crumbled tofu and bok choy.', 'ingredients' => 'sesame broth, ramen noodles, crumbled tofu, bok choy, chili oil', 'allergies' => 'gluten,sesame,soy', 'price' => 1390, 'image' => 'dishes/vegan-tantanmen.jpg'],
            ['name' => 'Shoyu Ramen', 'category' => 'Ramen', 'description' => 'Classic soy sauce based broth with chicken, bamboo shoots, and nori.', 'ingredients' => 'soy broth, chicken, ramen noodles, bamboo shoots, nori, scallions', 'allergies' => 'gluten,soy', 'price' => 1350, 'image' => 'dishes/shoyu-ramen.jpg'],
            ['name' => 'Shio Ramen', 'category' => 'Ramen', 'description' => 'Light and clear salt-based broth with delicate chicken and yuzu zest.', 'ingredients' => 'salt broth, chicken breast, ramen noodles, yuzu zest, scallions, nori', 'allergies' => 'gluten', 'price' => 1350, 'image' => 'dishes/shio-ramen.jpg'],
            ['name' => 'Tsukemen', 'category' => 'Ramen', 'description' => 'Chilled noodles served with a rich dipping broth on the side.', 'ingredients' => 'thick ramen noodles, pork broth dip, chashu, nori, ajitama egg', 'allergies' => 'gluten,soy,eggs', 'price' => 1490, 'image' => 'dishes/tsukemen.jpg'],

            ['name' => 'Dragon Roll', 'category' => 'Sushi', 'description' => 'Shrimp tempura roll topped with avocado and eel sauce.', 'ingredients' => 'shrimp tempura, avocado, rice, nori, eel sauce, sesame seeds', 'allergies' => 'shellfish,gluten,sesame', 'price' => 1690, 'image' => 'dishes/dragon-roll.jpg'],
            ['name' => 'Salmon Nigiri Set', 'category' => 'Sushi', 'description' => 'Six pieces of fresh salmon over pressed sushi rice.', 'ingredients' => 'fresh salmon, sushi rice, wasabi', 'allergies' => 'fish', 'price' => 1290, 'image' => 'dishes/salmon-nigiri.jpg'],
            ['name' => 'California Roll', 'category' => 'Sushi', 'description' => 'Classic crab and avocado roll with cucumber.', 'ingredients' => 'crab stick, avocado, cucumber, rice, nori, mayo', 'allergies' => 'shellfish,eggs', 'price' => 990, 'image' => 'dishes/california-roll.jpg'],
            ['name' => 'Tuna Sashimi', 'category' => 'Sushi', 'description' => 'Eight slices of premium bluefin tuna.', 'ingredients' => 'bluefin tuna, daikon, shiso leaf', 'allergies' => 'fish', 'price' => 1890, 'image' => 'dishes/tuna-sashimi.jpg'],
            ['name' => 'Spicy Tuna Roll', 'category' => 'Sushi', 'description' => 'Spicy tuna and cucumber roll with sriracha mayo and tobiko.', 'ingredients' => 'tuna, sriracha mayo, cucumber, rice, nori, tobiko', 'allergies' => 'fish,eggs', 'price' => 1190, 'image' => 'dishes/spicy-tuna-roll.jpg'],
            ['name' => 'Ebi Nigiri Set', 'category' => 'Sushi', 'description' => 'Six pieces of butterflied prawn over seasoned sushi rice.', 'ingredients' => 'tiger prawns, sushi rice, wasabi', 'allergies' => 'shellfish', 'price' => 1190, 'image' => 'dishes/ebi-nigiri.jpg'],

            ['name' => 'Chicken Karaage', 'category' => 'Appetizers', 'description' => 'Crispy Japanese fried chicken served with yuzu mayo.', 'ingredients' => 'chicken thigh, potato starch, ginger, garlic, soy sauce, yuzu mayo', 'allergies' => 'gluten,soy,eggs', 'price' => 890, 'image' => 'dishes/chicken-karaage.jpg'],
            ['name' => 'Yasai Gyoza', 'category' => 'Appetizers', 'description' => 'Pan-fried vegetable dumplings with dipping sauce.', 'ingredients' => 'cabbage, chives, mushrooms, gyoza wrapper, sesame oil', 'allergies' => 'gluten,sesame', 'price' => 750, 'image' => 'dishes/yasai-gyoza.jpg'],
            ['name' => 'Edamame', 'category' => 'Appetizers', 'description' => 'Steamed young soybeans lightly salted.', 'ingredients' => 'edamame, sea salt', 'allergies' => 'soy', 'price' => 490, 'image' => 'dishes/edamame.jpg'],
            ['name' => 'Takoyaki', 'category' => 'Appetizers', 'description' => 'Crispy octopus balls topped with bonito flakes and takoyaki sauce.', 'ingredients' => 'octopus, batter, bonito flakes, takoyaki sauce, mayo, aonori', 'allergies' => 'gluten,eggs,fish', 'price' => 850, 'image' => 'dishes/takoyaki.jpg'],
            ['name' => 'Agedashi Tofu', 'category' => 'Appetizers', 'description' => 'Lightly fried tofu in warm dashi broth.', 'ingredients' => 'silken tofu, dashi, soy sauce, mirin, grated daikon, ginger', 'allergies' => 'soy,gluten,fish', 'price' => 790, 'image' => 'dishes/agedashi-tofu.jpg'],
            ['name' => 'Ebi Tempura', 'category' => 'Appetizers', 'description' => 'Golden crispy prawn tempura served with tentsuyu dipping sauce.', 'ingredients' => 'tiger prawns, tempura batter, tentsuyu, grated daikon', 'allergies' => 'shellfish,gluten', 'price' => 950, 'image' => 'dishes/ebi-tempura.jpg'],

            ['name' => 'Signature Tempura Set', 'category' => 'Main Dishes', 'description' => 'Chef\'s selection of prawn and seasonal vegetable tempura.', 'ingredients' => 'tiger prawns, sweet potato, lotus root, shiso, tempura batter, tentsuyu', 'allergies' => 'shellfish,gluten', 'price' => 1890, 'image' => 'dishes/signature-tempura.jpg'],
            ['name' => 'Beef Teriyaki', 'category' => 'Main Dishes', 'description' => 'Tender sliced beef glazed in homemade teriyaki sauce.', 'ingredients' => 'beef sirloin, teriyaki sauce, steamed rice, broccoli', 'allergies' => 'soy,gluten', 'price' => 1690, 'image' => 'dishes/beef-teriyaki.jpg'],
            ['name' => 'Unagi Don', 'category' => 'Main Dishes', 'description' => 'Grilled freshwater eel over rice with sweet kabayaki sauce.', 'ingredients' => 'eel, rice, kabayaki sauce, pickled ginger, nori', 'allergies' => 'fish,soy,gluten', 'price' => 1990, 'image' => 'dishes/unagi-don.jpg'],
            ['name' => 'Japanese Curry Rice', 'category' => 'Main Dishes', 'description' => 'Rich and savory Japanese curry with tender vegetables and rice.', 'ingredients' => 'curry roux, potato, carrot, onion, rice, fukujinzuke', 'allergies' => 'gluten,dairy', 'price' => 1190, 'image' => 'dishes/japanese-curry.jpg'],
            ['name' => 'Tofu Katsu Curry', 'category' => 'Main Dishes', 'description' => 'Crispy breaded tofu cutlet with Japanese curry sauce and rice.', 'ingredients' => 'tofu, panko breadcrumbs, curry sauce, rice, pickles', 'allergies' => 'gluten,soy', 'price' => 1290, 'image' => 'dishes/tofu-katsu.jpg'],
            ['name' => 'Chicken Katsudon', 'category' => 'Main Dishes', 'description' => 'Crispy chicken cutlet simmered with egg over a bowl of rice.', 'ingredients' => 'chicken breast, panko breadcrumbs, egg, onion, dashi, rice', 'allergies' => 'gluten,eggs', 'price' => 1390, 'image' => 'dishes/chicken-katsudon.jpg'],

            ['name' => 'Miso Soup', 'category' => 'Sides', 'description' => 'Traditional Japanese miso soup with tofu and wakame.', 'ingredients' => 'miso paste, tofu, wakame, dashi, scallions', 'allergies' => 'soy,fish', 'price' => 390, 'image' => 'dishes/miso-soup.jpg'],
            ['name' => 'Steamed Rice', 'category' => 'Sides', 'description' => 'Perfectly steamed short-grain Japanese rice.', 'ingredients' => 'Japanese short-grain rice', 'allergies' => null, 'price' => 290, 'image' => 'dishes/steamed-rice.jpg'],
            ['name' => 'Seaweed Salad', 'category' => 'Sides', 'description' => 'Chilled seasoned wakame seaweed with sesame dressing.', 'ingredients' => 'wakame, sesame oil, rice vinegar, soy sauce, chili flakes, sesame seeds', 'allergies' => 'soy,sesame', 'price' => 490, 'image' => 'dishes/seaweed-salad.jpg'],
            ['name' => 'Pickled Vegetables', 'category' => 'Sides', 'description' => 'Assorted Japanese pickles including daikon, cucumber, and ginger.', 'ingredients' => 'daikon, cucumber, ginger, rice vinegar, sugar, salt', 'allergies' => null, 'price' => 350, 'image' => 'dishes/pickled-vegetables.jpg'],
            ['name' => 'Tamagoyaki', 'category' => 'Sides', 'description' => 'Sweet rolled Japanese omelette sliced into bite-sized pieces.', 'ingredients' => 'eggs, dashi, soy sauce, mirin, sugar', 'allergies' => 'eggs,soy,fish', 'price' => 450, 'image' => 'dishes/tamagoyaki.jpg'],
            ['name' => 'Kimchi', 'category' => 'Sides', 'description' => 'Spicy fermented napa cabbage with a tangy kick.', 'ingredients' => 'napa cabbage, gochugaru, garlic, ginger, fish sauce, scallions', 'allergies' => 'fish', 'price' => 350, 'image' => 'dishes/kimchi.jpg'],

            ['name' => 'Matcha Cheesecake', 'category' => 'Desserts', 'description' => 'Creamy Japanese-style cheesecake with matcha green tea.', 'ingredients' => 'cream cheese, matcha powder, sugar, eggs, butter, biscuit base', 'allergies' => 'dairy,gluten,eggs', 'price' => 690, 'image' => 'dishes/matcha-cheesecake.jpg'],
            ['name' => 'Mochi Ice Cream', 'category' => 'Desserts', 'description' => 'Soft rice cake filled with creamy ice cream in assorted flavors.', 'ingredients' => 'glutinous rice flour, ice cream, sugar, cornstarch', 'allergies' => 'dairy,gluten', 'price' => 590, 'image' => 'dishes/mochi-ice-cream.jpg'],
            ['name' => 'Dorayaki', 'category' => 'Desserts', 'description' => 'Fluffy pancakes filled with sweet red bean paste.', 'ingredients' => 'flour, eggs, sugar, honey, red bean paste', 'allergies' => 'gluten,eggs', 'price' => 550, 'image' => 'dishes/dorayaki.jpg'],
            ['name' => 'Black Sesame Panna Cotta', 'category' => 'Desserts', 'description' => 'Silky Italian-Japanese fusion dessert with roasted black sesame.', 'ingredients' => 'cream, black sesame paste, sugar, gelatin, milk', 'allergies' => 'dairy,sesame', 'price' => 650, 'image' => 'dishes/black-sesame-panna-cotta.jpg'],
            ['name' => 'Yuzu Sorbet', 'category' => 'Desserts', 'description' => 'Refreshing citrus sorbet made with Japanese yuzu.', 'ingredients' => 'yuzu juice, sugar, water', 'allergies' => null, 'price' => 490, 'image' => 'dishes/yuzu-sorbet.jpg'],
            ['name' => 'Taiyaki', 'category' => 'Desserts', 'description' => 'Fish-shaped waffle filled with custard cream.', 'ingredients' => 'flour, eggs, sugar, custard cream, butter', 'allergies' => 'gluten,dairy,eggs', 'price' => 520, 'image' => 'dishes/taiyaki.jpg'],
        ];

        foreach ($dishes as $dish) {
            DB::table('dishes')->insert([
                ...$dish,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
