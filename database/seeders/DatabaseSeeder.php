<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(AdminUserSeeder::class);
        $this->call([
            BusinessSeeder::class, // 👈 Tell Laravel to ONLY run the clean business seeder
        ]);
    }
}