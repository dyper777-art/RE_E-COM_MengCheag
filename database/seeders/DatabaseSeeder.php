<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        $products = [
            [
                'name' => 'Crab Pool Security 1',
                'description' => 'Delicious crab meal',
                'price' => 30.00,
                'stock' => 10,
                'image_url' => 'images/feature-1.jpg',
                'status' => 'ACTIVE',
            ],
            [
                'name' => 'Crab Pool Security 2',
                'description' => 'Delicious crab meal',
                'price' => 30.00,
                'stock' => 10,
                'image_url' => 'images/feature-2.jpg',
                'status' => 'ACTIVE',
            ],
            [
                'name' => 'Crab Pool Security 3',
                'description' => 'Delicious crab meal',
                'price' => 30.00,
                'stock' => 10,
                'image_url' => 'images/feature-3.jpg',
                'status' => 'ACTIVE',
            ],
            [
                'name' => 'Crab Pool Security 4',
                'description' => 'Delicious crab meal',
                'price' => 30.00,
                'stock' => 10,
                'image_url' => 'images/feature-4.jpg',
                'status' => 'ACTIVE',
            ],
            [
                'name' => 'Crab Pool Security 5',
                'description' => 'Delicious crab meal',
                'price' => 30.00,
                'stock' => 10,
                'image_url' => 'images/feature-5.jpg',
                'status' => 'ACTIVE',
            ],
            [
                'name' => 'Crab Pool Security 6',
                'description' => 'Delicious crab meal',
                'price' => 30.00,
                'stock' => 10,
                'image_url' => 'images/feature-6.jpg',
                'status' => 'ACTIVE',
            ],
            [
                'name' => 'Crab Pool Security 7',
                'description' => 'Delicious crab meal',
                'price' => 30.00,
                'stock' => 10,
                'image_url' => 'images/feature-7.jpg',
                'status' => 'ACTIVE',
            ],
            [
                'name' => 'Crab Pool Security 8',
                'description' => 'Delicious crab meal',
                'price' => 30.00,
                'stock' => 10,
                'image_url' => 'images/feature-8.jpg',
                'status' => 'ACTIVE',
            ],
        ];

        foreach ($products as $product) {
            DB::table('products')->insert(array_merge($product, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }



    User::factory()->create([
        'name' => 'admin',
        'email' => 'admin@example.com',
        'password' => Hash::make('123'),
    ]);

    }
}
