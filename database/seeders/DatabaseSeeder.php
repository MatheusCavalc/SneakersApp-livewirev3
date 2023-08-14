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

        $luka_collection = \App\Models\Collection::create([
            'name' => 'Luka',
            'brand_id' => 1,
            'description' => 'Designed for #77 and made for every athlete craving speed and efficiency, Lukas debut delivers the goods. The first shoe with full-length Formula 23 foam, it has an ultra-supportive fit crafted with the step-back in mind. Meanwhile, strong and lightweight Flight Wire cables keep you feeling contained, whether youre playing indoors or out. This is the assist youve been waiting for—get out there and make your shot.',
            'image' => 'public/collections/luka-collection.avif',
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
            'sizes' => ["38", "39"],
            'collection_id' => 1
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
            'sizes' => ["38", "39"],
            'collection_id' => 1
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
            'sizes' => ["38", "39", "40"],
            'collection_id' => 1
        ]);



        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
