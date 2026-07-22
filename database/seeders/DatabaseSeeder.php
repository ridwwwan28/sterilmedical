<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Muhammad Ridwan',
            'email' => 'ridwan@danpacpharma.com',
            'password' => bcrypt('ridwan1234'),
            'role' => 'superadmin'
        ]);

        \App\Models\BrandStory::create([
            'header_title' => 'Lorem ipsum dolor sit amet.',
            'header_description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum ut, fuga aliquid optio voluptate iste aliquam? Explicabo dolorem modi placeat!',
            'vision_title' => 'Brand Vision',
            'vision_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Repudiandae, nesciunt. Perspiciatis ipsum neque sequi ullam reiciendis dignissimos assumenda quo iusto?',
            'vision_image' => null, // fallback in blade
            'mission_title' => 'Brand Mission',
            'mission_description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Saepe adipisci, numquam deleniti architecto voluptates repudiandae? Excepturi eligendi aliquid ad repellat.',
            'mission_image' => null, // fallback in blade
            'timeline_title' => 'Awal Perjalanan Brand Steril Medical',
            'timeline_subtitle' => 'Kami memulai perjalanan ini dengan penuh keyakinan',
            'timeline_items' => [
                [
                    'year' => '1988',
                    'description' => 'Sejak Tahun 1988. Bersama-sama, kami memproduksi dan mendistribusi alat kesehatan habis pakai yang berkualitas dan steril pada saat penggunaan'
                ],
                [
                    'year' => '2011',
                    'description' => 'Pada Tahun 2011 berdirilah PT STERIL MEDICAL INDONESIA'
                ],
                [
                    'year' => '2013',
                    'description' => 'Sejalan dengan perkembangan bisnis didirikan PT. STERIL MEDICAL INDUSTRI dengan kerjasama dengan PT. STERIL MEDICAL Ltd untuk mendukung alat kesehatan dalam negeri'
                ],
                [
                    'year' => '2017',
                    'description' => 'Pada tahun ini mulai membangun pasar indonesia untuk produk alat kesehatan habis pakai yang di import dari PT STERIL MEDICAL Ltd'
                ],
                [
                    'year' => '2018',
                    'description' => 'Dengan perkembangan PT. STERIL MEDICAL INDONESIA kami membangun jaringan penjualan nasional dan juga business to business'
                ],
                [
                    'year' => '2025',
                    'description' => 'Penggabungan PT. STERIL MEDICAL INDONESIA dengan PT. DANPAC PHARMA'
                ]
            ],
            'product_cities' => [
                [
                    'city' => 'Jakarta',
                    'latitude' => '-6.2088',
                    'longitude' => '106.8456',
                ],
                [
                    'city' => 'Surabaya',
                    'latitude' => '-7.2504',
                    'longitude' => '112.7688',
                ],
                [
                    'city' => 'Bandung',
                    'latitude' => '-6.9175',
                    'longitude' => '107.6191',
                ],
            ]
        ]);

        \App\Models\Quality::create([
            'header_title' => 'Lorem ipsum.',
            'header_subtitle' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit.',
            'header_description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Est sed minus cupiditate ipsa ullam nostrum inventore rerum laborum incidunt! Suscipit iure quia fugiat quas vero!',
            'certificate_image' => null,
            'achievements' => [
                ['value' => '1998', 'label' => 'Berdiri sejak tahun'],
                ['value' => '10', 'label' => 'Kota Penyebaran'],
                ['value' => '100%', 'label' => 'Kepuasan Pelanggan']
            ],
            'info_title' => 'Perlengkapan Medis untuk Seluruh Komunitas',
            'info_description' => 'Steril Medical memasok perlengkapan medis ke rumah sakit, laboratorium, klinik, layanan perawatan dirumah, tenaga medis, instansi pemerintah, dan lembaga medis',
            'info_images' => null,
            'trusted_title' => 'Dipercaya Oleh Para Pemimpin Industri',
            'trusted_logos' => [
                ['image' => 'img/quality/Akurat.png', 'alt_text' => 'Akurat'],
                ['image' => 'img/quality/Arjoena.png', 'alt_text' => 'Parkway'],
                ['image' => 'img/quality/Logo-01.png', 'alt_text' => 'Alexandra'],
                ['image' => 'img/quality/Logo-02.png', 'alt_text' => 'A*STAR'],
                ['image' => 'img/quality/logo-Onestep2.png', 'alt_text' => 'KK Hospital'],
            ]
        ]);

        \App\Models\ProductPageSetting::create([
            'header_title' => 'Lorem ipsum dolor sit amet.',
            'header_description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Cum ut, fuga aliquid optio voluptate iste aliquam? Explicabo dolorem modi placeat!'
        ]);

        $groupMedis = \App\Models\ProductGroup::create([
            'name' => 'Alat & Perlengkapan Medis',
            'slug' => 'alat-perlengkapan-medis',
        ]);

        $groupSpesialis = \App\Models\ProductGroup::create([
            'name' => 'Layanan & Perawatan Spesialis',
            'slug' => 'layanan-perawatan-spesialis',
        ]);

        $categoriesMap = [
            'UMUM' => \App\Models\ProductCategory::create(['product_group_id' => $groupMedis->id, 'name' => 'UMUM', 'slug' => 'umum']),
            'OBGYN' => \App\Models\ProductCategory::create(['product_group_id' => $groupMedis->id, 'name' => 'OBGYN', 'slug' => 'obgyn']),
            'DINKES PKM' => \App\Models\ProductCategory::create(['product_group_id' => $groupMedis->id, 'name' => 'DINKES PKM', 'slug' => 'dinkes-pkm']),
            'HOMECARE' => \App\Models\ProductCategory::create(['product_group_id' => $groupSpesialis->id, 'name' => 'HOMECARE', 'slug' => 'homecare']),
            'HEMODIALISA' => \App\Models\ProductCategory::create(['product_group_id' => $groupSpesialis->id, 'name' => 'HEMODIALISA', 'slug' => 'hemodialisa']),
        ];

        $products = config('products') ?? [];
        foreach ($products as $index => $prod) {
            $catName = strtoupper($prod['category'] ?? 'UMUM');
            $categoryModel = $categoriesMap[$catName] ?? $categoriesMap['UMUM'];

            // Tandai beberapa produk (misal produk pertama dan ketiga) sebagai produk unggulan
            $isFeatured = in_array($prod['slug'], ['infusion-set', 'surgical-face-mask', 'sterile-urine-bag']);

            \App\Models\Product::create([
                'name' => $prod['name'],
                'slug' => $prod['slug'],
                'product_category_id' => $categoryModel->id,
                'image' => $prod['image'],
                'description' => $prod['description'],
                'specifications' => $prod['specifications'] ?? [],
                'is_featured' => $isFeatured,
            ]);
        }

        \App\Models\HeroSlide::create([
            'image' => 'img/hero/hero.jpg',
            'is_active' => true,
            'sort_order' => 1,
        ]);

        \App\Models\HeroSlide::create([
            'image' => 'img/hero/hero.jpg',
            'is_active' => true,
            'sort_order' => 2,
        ]);

        \App\Models\HomeSetting::create([
            'secondary_banner_image' => 'img/hero/hero.jpg',
        ]);
    }
}
