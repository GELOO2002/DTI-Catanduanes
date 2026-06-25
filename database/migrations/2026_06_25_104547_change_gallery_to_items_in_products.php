<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Drop old columns
            $table->dropColumn(['gallery', 'gallery_names', 'gallery_descriptions']);
            
            // Add new single column for gallery items
            $table->json('gallery_items')->nullable()->after('image');
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('gallery_items');
            $table->json('gallery')->nullable();
            $table->json('gallery_names')->nullable();
            $table->json('gallery_descriptions')->nullable();
        });
    }
};