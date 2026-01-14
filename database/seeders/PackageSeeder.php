<?php

namespace Database\Seeders;

use App\Models\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $packages = [
            // Home Internet Packages
            [
                'category_id' => 1,
                'name' => 'Paket Starter',
                'slug' => 'paket-starter',
                'speed' => '20 Mbps',
                'price' => 199000,
                'original_price' => 250000,
                'features' => [
                    'Unlimited Kuota',
                    'Free Instalasi',
                    'Free Modem',
                    'Support 24/7',
                ],
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 1,
            ],
            [
                'category_id' => 1,
                'name' => 'Paket Family',
                'slug' => 'paket-family',
                'speed' => '50 Mbps',
                'price' => 299000,
                'original_price' => 350000,
                'features' => [
                    'Unlimited Kuota',
                    'Free Instalasi',
                    'Free Modem WiFi 6',
                    'Support 24/7',
                    'Free Netflix 1 Bulan',
                ],
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 2,
            ],
            [
                'category_id' => 1,
                'name' => 'Paket Premium',
                'slug' => 'paket-premium',
                'speed' => '100 Mbps',
                'price' => 399000,
                'original_price' => 500000,
                'features' => [
                    'Unlimited Kuota',
                    'Free Instalasi',
                    'Free Modem WiFi 6',
                    'Support 24/7',
                    'Free Netflix 3 Bulan',
                    'Priority Support',
                ],
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 3,
            ],
            
            // Business Internet Packages
            [
                'category_id' => 2,
                'name' => 'Business Lite',
                'slug' => 'business-lite',
                'speed' => '100 Mbps',
                'price' => 599000,
                'original_price' => null,
                'features' => [
                    'Unlimited Kuota',
                    'Dedicated Line',
                    'Static IP',
                    'SLA 99.5%',
                    'Support 24/7',
                ],
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 4,
            ],
            [
                'category_id' => 2,
                'name' => 'Business Pro',
                'slug' => 'business-pro',
                'speed' => '300 Mbps',
                'price' => 999000,
                'original_price' => null,
                'features' => [
                    'Unlimited Kuota',
                    'Dedicated Line',
                    'Static IP',
                    'SLA 99.9%',
                    'Support 24/7',
                    'Free Backup Line',
                ],
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 5,
            ],
            
            // Gaming Packages
            [
                'category_id' => 3,
                'name' => 'Gaming Basic',
                'slug' => 'gaming-basic',
                'speed' => '50 Mbps',
                'price' => 349000,
                'original_price' => 400000,
                'features' => [
                    'Unlimited Kuota',
                    'Low Latency < 10ms',
                    'Free Modem Gaming',
                    'Priority Routing',
                    'Support 24/7',
                ],
                'is_featured' => false,
                'is_active' => true,
                'sort_order' => 6,
            ],
            [
                'category_id' => 3,
                'name' => 'Gaming Ultimate',
                'slug' => 'gaming-ultimate',
                'speed' => '200 Mbps',
                'price' => 599000,
                'original_price' => 700000,
                'features' => [
                    'Unlimited Kuota',
                    'Low Latency < 5ms',
                    'Free Gaming Router',
                    'Priority Routing',
                    'Support 24/7',
                    'Free Discord Nitro',
                    'Anti-DDoS Protection',
                ],
                'is_featured' => true,
                'is_active' => true,
                'sort_order' => 7,
            ],
        ];

        foreach ($packages as $package) {
            Package::create($package);
        }
    }
}
