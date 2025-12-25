<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('products')->insert([
            [
                'product_id' => 1,
                'name' => "McDonald's Big Mac",
                'description' => 'The legendary double-decker burger with special sauce, lettuce, cheese, pickles, onions, and sesame seed bun – a global symbol of fast food.',
                'price' => 5.00,
                'stock' => 100,
                'image_url' => 'frontend/assets/images/1766636062_65947cd2a2c28c35b5ca6fb1_Whopper_Cheese.png',
                'status' => 'ACTIVE',
                'created_at' => Carbon::parse('2025-12-22 12:44:12'),
                'updated_at' => Carbon::parse('2025-12-25 04:14:22'),
            ],
            [
                'product_id' => 2,
                'name' => 'Burger King Whopper',
                'description' => 'Flame-grilled beef patty topped with tomatoes, lettuce, mayo, ketchup, pickles, and onions on a sesame bun – known for its smoky flavor.',
                'price' => 6.00,
                'stock' => 80,
                'image_url' => 'frontend/assets/images/1766636211_OS_3Col2.webp',
                'status' => 'ACTIVE',
                'created_at' => Carbon::parse('2025-12-22 12:44:12'),
                'updated_at' => Carbon::parse('2025-12-25 04:16:51'),
            ],
            [
                'product_id' => 3,
                'name' => 'Chick-fil-A Original Chicken Sandwich',
                'description' => 'Crispy, pressure-cooked chicken breast with pickles on a buttered bun – simple, juicy, and a fan favorite.',
                'price' => 15.00,
                'stock' => 80,
                'image_url' => 'frontend/assets/images/1766636319_0000s_0009_Final__0026_CFA_PDP_Grilled-Deluxe-Sandwich_1085.webp',
                'status' => 'ACTIVE',
                'created_at' => Carbon::parse('2025-12-22 12:44:12'),
                'updated_at' => Carbon::parse('2025-12-25 04:18:39'),
            ],
            [
                'product_id' => 4,
                'name' => 'Popeyes Chicken Sandwich',
                'description' => 'Buttery brioche bun, crispy fried chicken, pickles, and spicy or classic mayo – sparked the "chicken sandwich wars".',
                'price' => 5.00,
                'stock' => 50,
                'image_url' => 'frontend/assets/images/1766636367_maxresdefault.jpg',
                'status' => 'ACTIVE',
                'created_at' => Carbon::parse('2025-12-22 12:44:12'),
                'updated_at' => Carbon::parse('2025-12-25 04:19:27'),
            ],
            [
                'product_id' => 5,
                'name' => 'KFC Original Recipe Fried Chicken',
                'description' => 'The secret 11 herbs and spices make this bucket staple irresistibly crunchy and flavorful.',
                'price' => 6.00,
                'stock' => 160,
                'image_url' => 'frontend/assets/images/1766636421_images.jpeg',
                'status' => 'ACTIVE',
                'created_at' => Carbon::parse('2025-12-22 12:44:12'),
                'updated_at' => Carbon::parse('2025-12-25 04:20:21'),
            ],
            [
                'product_id' => 6,
                'name' => 'Taco Bell Crunchwrap Supreme',
                'description' => 'Hexagonal grilled masterpiece with seasoned beef, nacho cheese, lettuce, tomatoes, sour cream, and a crunchy tostada shell.',
                'price' => 8.00,
                'stock' => 90,
                'image_url' => 'frontend/assets/images/1766636465_The_Monster__1.jpg',
                'status' => 'ACTIVE',
                'created_at' => Carbon::parse('2025-12-22 12:44:12'),
                'updated_at' => Carbon::parse('2025-12-25 04:21:05'),
            ],
            [
                'product_id' => 7,
                'name' => 'Subway Footlong Sandwich',
                'description' => 'Customizable subs loaded with meats, cheeses, veggies, and sauces – the ultimate build-your-own classic.',
                'price' => 17.00,
                'stock' => 100,
                'image_url' => 'frontend/assets/images/1766636518_Frosty-Swirls-and-Infusions-FT-BLOG0425-84c16564979d44a2b8d65e86f3eae9a5.jpg',
                'status' => 'ACTIVE',
                'created_at' => Carbon::parse('2025-12-22 12:44:12'),
                'updated_at' => Carbon::parse('2025-12-25 04:21:58'),
            ],
            [
                'product_id' => 10,
                'name' => "Wendy's Frosty",
                'description' => 'Classic creamy frozen dessert that pairs perfectly with fries.',
                'price' => 3.00,
                'stock' => 130,
                'image_url' => 'frontend/assets/images/1766636564_5d0d36ef9c51012dae0ead4c.webp',
                'status' => 'ACTIVE',
                'created_at' => Carbon::parse('2025-12-24 03:16:05'),
                'updated_at' => Carbon::parse('2025-12-25 04:22:44'),
            ],
            [
                'product_id' => 11,
                'name' => "Dunkin' Glazed Donut",
                'description' => 'Light, fluffy yeast donut with that signature sweet glaze.',
                'price' => 9.00,
                'stock' => 70,
                'image_url' => 'frontend/assets/images/1766636645_cinnamon-crumble-oatmilk-frappuccino-featured-2.webp',
                'status' => 'ACTIVE',
                'created_at' => Carbon::parse('2025-12-24 03:17:31'),
                'updated_at' => Carbon::parse('2025-12-25 04:24:05'),
            ],
        ]);
    }
}
