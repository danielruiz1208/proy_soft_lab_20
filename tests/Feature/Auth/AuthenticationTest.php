<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_home_screen_shows_login_for_guests(): void
    {
        $response = $this->get('/');

        $response->assertOk();
        $response->assertViewIs('auth.login');
    }

    public function test_login_screen_can_be_rendered(): void
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'user' => $user->user,
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect(route('dashboard', absolute: false));
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'user' => $user->user,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }

    public function test_users_can_logout(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/logout');

        $this->assertGuest();
        $response->assertRedirect('/');
    }

    public function test_dashboard_redirects_admins_to_user_management(): void
    {
        $admin = User::factory()->create([
            'rol' => 'admin',
        ]);

        $response = $this
            ->actingAs($admin)
            ->get('/dashboard');

        $response->assertRedirect(route('admin.users.index', absolute: false));
    }

    public function test_dashboard_redirects_users_to_profile(): void
    {
        $user = User::factory()->create([
            'rol' => 'usuario',
        ]);

        $response = $this
            ->actingAs($user)
            ->get('/dashboard');

        $response->assertRedirect(route('profile.edit', absolute: false));
    }

    public function test_home_screen_shows_full_name_when_authenticated(): void
    {
        $user = User::factory()->create([
            'name' => 'Juan Perez',
        ]);

        $response = $this
            ->actingAs($user)
            ->get('/');

        $response->assertOk();
        $response->assertSee('Juan Perez');
    }
}
