<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Business;

class BusinessSeeder extends Seeder
{
    public function run(): void
    {
        $jaz = Business::create([
            'name'    => 'JAZ HANDICRAFT',
            'fb_page' => 'https://www.facebook.com/share/1BajszdpdF/',
            'history' => 'Jaz Handicraft, a coco craft business owned by Mr. Jobel T. Cabrera and managed by his wife, Ms. Arlene P. Cabrera, started its journey in October 2018 with a simple dream and borrowed tools...', // (truncated for view space)
        ]);

        $jaz->products()->create([
            'name'        => 'cocoashtray',
           
        ]);
    }
}