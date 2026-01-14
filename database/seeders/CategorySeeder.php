<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'name' => 'Home Internet',
                'slug' => 'home-internet',
                'description' => 'Paket internet untuk kebutuhan rumah tangga dengan kecepatan stabil',
                'icon' => '🏠',
                'is_active' => true,
            ],
            [
                'name' => 'Business Internet',
                'slug' => 'business-internet',
                'description' => 'Paket internet khusus untuk kebutuhan bisnis dan kantor',
                'icon' => '💼',
                'is_active' => true,
            ],
            [
                'name' => 'Gaming Package',
                'slug' => 'gaming-package',
                'description' => 'Paket internet dengan low latency untuk gaming dan streaming',
                'icon' => '🎮',
                'is_active' => true,
            ],
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }
    }
}
