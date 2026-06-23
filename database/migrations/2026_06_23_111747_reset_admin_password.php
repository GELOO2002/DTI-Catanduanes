<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

return new class extends Migration
{
    public function up(): void
    {
        // Update the admin password to ensure it matches
        DB::table('users')
            ->where('email', 'admin@dti.com')
            ->update(['password' => Hash::make('admin123')]);
    }

    public function down(): void {}
};