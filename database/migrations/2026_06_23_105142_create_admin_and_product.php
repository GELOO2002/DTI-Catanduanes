<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\Business;
use App\Models\Product;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    public function up(): void
    {
        // Create admin user if doesn't exist
        if (!User::where('email', 'admin@dti.com')->exists()) {
            User::create([
                'name' => 'Admin',
                'email' => 'admin@dti.com',
                'password' => Hash::make('admin123'),
                'is_admin' => true,
            ]);
        }

        // Create business if doesn't exist
        if (!Business::where('name', 'JAZ HANDICRAFT')->exists()) {
            Business::create(['name' => 'JAZ HANDICRAFT']);
        }

        // Create product if doesn't exist
        $business = Business::where('name', 'JAZ HANDICRAFT')->first();
        if ($business && !Product::where('name', 'Coconut shell Handicrafts')->exists()) {
            Product::create([
                'business_id' => $business->id,
                'name' => 'Coconut shell Handicrafts',
                'image' => 'products/cocoashtray.jpg',
            ]);
        }
    }

    public function down(): void {}
};