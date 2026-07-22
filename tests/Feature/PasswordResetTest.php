<?php

namespace Tests\Feature;

use App\Models\User;
use Filament\Auth\Pages\PasswordReset\RequestPasswordReset;
use Filament\Auth\Pages\PasswordReset\ResetPassword;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Password;
use Livewire\Livewire;
use Tests\TestCase;

class PasswordResetTest extends TestCase
{
    use RefreshDatabase;

    public function test_password_reset_request_page_can_be_rendered(): void
    {
        $response = $this->get('/admin/password-reset/request');

        $response->assertStatus(200);
        $response->assertSee('Lupa kata sandi');
    }

    public function test_user_can_request_password_reset_link(): void
    {
        Notification::fake();

        $user = User::factory()->create([
            'email' => 'admin@sterilmedical.com',
            'role' => 'admin',
            'is_active' => true,
        ]);

        Livewire::test(RequestPasswordReset::class)
            ->fillForm([
                'email' => $user->email,
            ])
            ->call('request')
            ->assertHasNoFormErrors();
    }

    public function test_reset_password_page_can_be_rendered_with_valid_token(): void
    {
        $user = User::factory()->create([
            'email' => 'admin@sterilmedical.com',
            'role' => 'admin',
            'is_active' => true,
        ]);

        $token = Password::createToken($user);

        Livewire::test(ResetPassword::class, [
            'email' => $user->email,
            'token' => $token,
        ])
            ->assertStatus(200);
    }
}
