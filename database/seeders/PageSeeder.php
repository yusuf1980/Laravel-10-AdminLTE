<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Page;

class PageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $titles = ['Contact Us', 'About Us', 'Privacy Policy', 'Disclaimer'];
        foreach($titles as $title) {
            Page::factory()->count(1)->create([
                'title' => $title
            ]);
        }
    }
}
