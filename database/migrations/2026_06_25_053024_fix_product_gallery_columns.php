<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->json('gallery')->nullable()->change();
            $table->json('gallery_names')->nullable()->change();
            $table->json('gallery_descriptions')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->text('gallery')->nullable()->change();
            $table->text('gallery_names')->nullable()->change();
            $table->text('gallery_descriptions')->nullable()->change();
        });
    }
};