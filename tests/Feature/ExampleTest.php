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
}
