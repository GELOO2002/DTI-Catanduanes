<?php

namespace App\Http\Controllers;

use App\Models\Product; 
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Fetch your data
        $products = Product::with('business')->get();

        // 2. The loop processes image strings dynamically
        foreach ($products as $product) {
            
            // Build the main image asset path safely
            $mainImage = asset('images/' . $product->image);

            // Safely parse gallery names if they are array items or json strings
            $galleryImages = [];
            if (!empty($product->gallery_names)) {
                foreach ($product->gallery_names as $gallery) {
                    $galleryImages[] = asset('images/' . $gallery);
                }
            }

            // Combine them into a single continuous array of clean URLs
            $product->processed_images = array_merge([$mainImage], $galleryImages);
        }

        // 3. Return the view with the completely processed records
        return view('dti_dashboard', compact('products'));
    }
}