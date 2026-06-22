<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Business;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    public function run(): void
    {
        // Create business first
        $business1 = Business::create([
            'name' => 'JAZ HANDICRAFTS',
            'fb_page' => 'https://www.facebook.com/share/1BajszdpdF/',
            Product::create([
    'product_names' => 'Jaz handicraft',
    'gallery_images' => json_encode(['assets/product-main.png', 'image2.png', 'image3.png']),
]);
            'business_id' => $business1->id,
            'name' => 'coconut ashtray.png',
            'image' => ' https://images.unsplash.com/photo-1578749556568-bc2c40e68b61?w=500&q=80',
        ]);

        $business2 = Business::create([
            'name' => 'Virac Organic Food Products',
            'fb_page' => 'https://www.facebook.com/ViracOrganicFoods',
            'history' => '• Aug 2023: Initial backyard processing setup...'
        ]);

        Product::create([
            'business_id' => $business2->id,
            'name' => 'Roasted Bicol Pili Nuts',
            'description' => 'Crispy, buttery, and organically grown pili nuts harvested from local rich volcanic soils.',
            'image' => 'https://images.unsplash.com/photo-1599599810769-bcde5a160d32?w=500&q=80',
        ]);

        $business3 = Business::create([
            'name' => 'San Andres Handicraft Association',
            'fb_page' => 'https://www.facebook.com/SanAndresHandicrafts',
            'history' => '• March 2022: Association established...'
        ]);

        Product::create([
            'business_id' => $business3->id,
            'name' => 'Traditional Nito Baskets',
            'description' => 'Beautifully hand-woven multi-purpose storage baskets crafted out of sturdy local nito vines.',
            'image' => 'https://images.unsplash.com/photo-1590736969955-71cb54857544?w=500&q=80',
        ]);
    }
}