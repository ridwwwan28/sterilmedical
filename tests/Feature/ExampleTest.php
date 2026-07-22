<?php

namespace Tests\Feature;

use App\Models\WebsiteSetting;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_quality_page_returns_successful_response(): void
    {
        $response = $this->get('/kualitas');

        $response->assertStatus(200);
    }

    public function test_home_page_uses_website_settings_data(): void
    {
        WebsiteSetting::create([
            'meta_title' => 'Steril Medical Indonesia',
            'copyright' => '© 2026 Steril Medical Indonesia',
            'address' => 'Jl. Contoh No. 123, Jakarta',
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Steril Medical Indonesia');
        $response->assertSee('Jl. Contoh No. 123, Jakarta');
    }

    public function test_contact_page_uses_settings_email(): void
    {
        WebsiteSetting::create([
            'email' => 'info@sterilmedical.test',
        ]);

        $response = $this->get('/hubungi-kami');

        $response->assertStatus(200);
        $response->assertSee('info@sterilmedical.test');
    }

    public function test_product_list_page_returns_successful_response(): void
    {
        $response = $this->get('/produk');

        $response->assertStatus(200);
        $response->assertSee('Lorem ipsum dolor sit amet.');
    }

    public function test_product_detail_page_returns_successful_response(): void
    {
        $group = \App\Models\ProductGroup::create([
            'name' => 'Group Test',
            'slug' => 'group-test'
        ]);

        $category = \App\Models\ProductCategory::create([
            'product_group_id' => $group->id,
            'name' => 'Kategori Test',
            'slug' => 'kategori-test'
        ]);

        $product = \App\Models\Product::create([
            'name' => 'Test Product',
            'slug' => 'test-product',
            'product_category_id' => $category->id,
            'image' => 'img/products/produk_1.jpg',
            'description' => 'This is a test product',
            'specifications' => ['Bahan' => 'Latex']
        ]);

        $response = $this->get('/produk/test-product');

        $response->assertStatus(200);
        $response->assertSee('Test Product');
        $response->assertSee('This is a test product');
        $response->assertSee('Bahan');
        $response->assertSee('Kategori Test');
    }

    public function test_product_search_and_filter_functionality(): void
    {
        $group = \App\Models\ProductGroup::create([
            'name' => 'Group Medis',
            'slug' => 'group-medis'
        ]);

        $category = \App\Models\ProductCategory::create([
            'product_group_id' => $group->id,
            'name' => 'Masker',
            'slug' => 'masker'
        ]);

        \App\Models\Product::create([
            'name' => 'Masker Bedah 3Ply',
            'slug' => 'masker-bedah-3ply',
            'product_category_id' => $category->id,
            'description' => 'Masker bedah berkualitas tinggi',
        ]);

        // Test search filter
        $responseSearch = $this->get('/produk?search=Bedah');
        $responseSearch->assertStatus(200);
        $responseSearch->assertSee('Masker Bedah 3Ply');

        // Test group filter
        $responseGroup = $this->get('/produk?group=' . $group->id);
        $responseGroup->assertStatus(200);
        $responseGroup->assertSee('Masker Bedah 3Ply');

        // Test category filter
        $responseCategory = $this->get('/produk?group=' . $group->id . '&category=' . $category->id);
        $responseCategory->assertStatus(200);
        $responseCategory->assertSee('Masker Bedah 3Ply');
    }

    public function test_featured_product_shows_badge(): void
    {
        $group = \App\Models\ProductGroup::create([
            'name' => 'Group Unggulan Test',
            'slug' => 'group-unggulan-test'
        ]);

        $category = \App\Models\ProductCategory::create([
            'product_group_id' => $group->id,
            'name' => 'Kategori Unggulan',
            'slug' => 'kategori-unggulan'
        ]);

        \App\Models\Product::create([
            'name' => 'Produk Unggulan Super',
            'slug' => 'produk-unggulan-super',
            'product_category_id' => $category->id,
            'description' => 'Deskripsi produk unggulan',
            'is_featured' => true,
        ]);

        $responseCatalog = $this->get('/produk');
        $responseCatalog->assertStatus(200);
        $responseCatalog->assertSee('Produk Unggulan Super');
        $responseCatalog->assertSee('Unggulan');

        $responseDetail = $this->get('/produk/produk-unggulan-super');
        $responseDetail->assertStatus(200);
        $responseDetail->assertSee('Produk Unggulan');
    }

    public function test_home_page_shows_hero_slides_and_featured_products(): void
    {
        \App\Models\HeroSlide::create([
            'image' => 'img/hero/hero.jpg',
            'title' => 'Solusi Medis Pintar',
            'description' => 'Deskripsi slide hero tes',
            'is_active' => true,
            'sort_order' => 1,
        ]);

        \App\Models\HomeSetting::create([
            'secondary_banner_image' => 'img/hero/hero.jpg',
        ]);

        $group = \App\Models\ProductGroup::create([
            'name' => 'Group Home',
            'slug' => 'group-home'
        ]);

        $category = \App\Models\ProductCategory::create([
            'product_group_id' => $group->id,
            'name' => 'Kategori Home',
            'slug' => 'kategori-home'
        ]);

        for ($i = 1; $i <= 6; $i++) {
            \App\Models\Product::create([
                'name' => "Produk Unggulan $i",
                'slug' => "produk-unggulan-$i",
                'product_category_id' => $category->id,
                'description' => "Deskripsi $i",
                'is_featured' => true,
            ]);
        }

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Produk Kami');
        $response->assertSee('Produk Unggulan 1');
        $response->assertSee('Produk Unggulan 4');
        // Ensure max 4 featured products are shown on home page
        $response->assertDontSee('Produk Unggulan 5');
    }
}
