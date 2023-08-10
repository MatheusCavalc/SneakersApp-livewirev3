<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        $nike = \App\Models\Brand::create([
            'logo' => 'public/brands/nike-tr.png',
            'name' => 'Nike',
        ]);

        $adidas = \App\Models\Brand::create([
            'logo' => 'public/brands/adidas-tr.png',
            'name' => 'Adidas',
        ]);

        $dunklow = \App\Models\Sneaker::create([
            'published' => true,
            'brand_id' => 1,
            'image' => 'public/sneakers/dunklow.webp',
            'slug' => 'dunk-low-coast',
            'name' => 'Dunk Low Coast',
            'price' => '899',
            'promotion_price' => '799',
            'in_promotion' => true,
            'color' => 'White + Blue',
            'sizes' => ["38","39"],
        ]);

        $airforce = \App\Models\Sneaker::create([
            'published' => true,
            'brand_id' => 1,
            'image' => 'public/sneakers/airforce.webp',
            'slug' => 'air-force-1-07-masculino',
            'name' => 'Air Force 1 07 Masculino',
            'price' => '799',
            'promotion_price' => '',
            'in_promotion' => false,
            'color' => 'Black + White',
            'sizes' => ["38","39"],
        ]);

        $airforce = \App\Models\Sneaker::create([
            'published' => true,
            'brand_id' => 1,
            'image' => 'public/sneakers/luka1easter.webp',
            'slug' => 'luka-1-easter',
            'name' => 'Luka 1 "Easter"',
            'price' => '699',
            'promotion_price' => '649',
            'in_promotion' => true,
            'color' => 'Blue + Purple',
            'sizes' => ["38","39", "40"],
        ]);



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
