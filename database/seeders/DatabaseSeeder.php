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
            'name' => 'Test User',
            'email' => 'test@example.com',
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
            ]
        ]);
    }
}
