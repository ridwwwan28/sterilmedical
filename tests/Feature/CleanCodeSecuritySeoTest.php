<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductGroup;
use App\Models\User;
use Filament\Panel;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CleanCodeSecuritySeoTest extends TestCase
{
    use RefreshDatabase;

    public function test_all_web_pages_render_successfully_with_security_headers(): void
    {
        $group = ProductGroup::create(['name' => 'Group Test', 'slug' => 'group-test']);
        $category = ProductCategory::create([
            'product_group_id' => $group->id,
            'name' => 'Kategori Test',
            'slug' => 'kategori-test',
        ]);
        $product = Product::create([
            'product_category_id' => $category->id,
            'name' => 'Produk Test Security',
            'slug' => 'produk-test-security',
            'description' => 'Deskripsi test security',
            'is_featured' => true,
        ]);

        $routes = ['/', '/cerita-merk', '/produk', '/produk/produk-test-security', '/kualitas', '/hubungi-kami'];

        foreach ($routes as $path) {
            $response = $this->get($path);
            $response->assertStatus(200);
            $response->assertHeader('X-Frame-Options', 'SAMEORIGIN');
            $response->assertHeader('X-XSS-Protection', '1; mode=block');
            $response->assertHeader('X-Content-Type-Options', 'nosniff');
        }
    }

    public function test_sitemap_xml_returns_valid_content(): void
    {
        $response = $this->get('/sitemap.xml');
        $response->assertStatus(200);
        $response->assertHeader('Content-Type', 'application/xml');
        $this->assertStringContainsString('<?xml version="1.0" encoding="UTF-8"?>', $response->getContent());
        $this->assertStringContainsString('<urlset', $response->getContent());
    }

    public function test_robots_txt_file_exists_and_is_accessible(): void
    {
        $this->assertFileExists(public_path('robots.txt'));
        $content = file_get_contents(public_path('robots.txt'));
        $this->assertStringContainsString('Disallow: /admin', $content);
    }

    public function test_user_can_access_panel_only_when_active_admin(): void
    {
        $panel = new Panel();

        $activeAdmin = new User(['role' => 'admin', 'is_active' => true]);
        $this->assertTrue($activeAdmin->canAccessPanel($panel));

        $inactiveAdmin = new User(['role' => 'admin', 'is_active' => false]);
        $this->assertFalse($inactiveAdmin->canAccessPanel($panel));

        $normalUser = new User(['role' => 'user', 'is_active' => true]);
        $this->assertFalse($normalUser->canAccessPanel($panel));
    }
}
