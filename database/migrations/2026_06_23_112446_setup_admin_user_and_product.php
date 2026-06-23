<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    public function up(): void
    {
        // Delete if exists
        DB::table('users')->where('email', 'admin@dti.com')->delete();
        
        // Create fresh admin user
        DB::table('users')->insert([
            'name' => 'Admin',
            'email' => 'admin@dti.com',
            'password' => Hash::make('admin123'),
            'is_admin' => 1,
            'email_verified_at' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    public function down(): void {}
};