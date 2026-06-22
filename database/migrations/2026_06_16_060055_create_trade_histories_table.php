<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('trade_histories', function (Blueprint $table) {
        $table->id();
        // Links the history row directly to the business
        $table->foreignId('business_id')->constrained()->onDelete('cascade');
        $table->string('log_message');       // e.g., "Updated product catalog"
        $table->timestamps();                // Tracks when it happened automatically
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trade_histories');
    }
};
