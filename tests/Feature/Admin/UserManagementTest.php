<?php

namespace Tests\Feature\Admin;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserManagementTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_view_user_management(): void
    {
        $admin = User::factory()->create([
            'rol' => 'admin',
        ]);

        $response = $this
            ->actingAs($admin)
            ->get('/admin/users');

        $response->assertOk();
        $response->assertSee($admin->name);
    }

    public function test_non_admin_cannot_view_user_management(): void
    {
        $user = User::factory()->create([
            'rol' => 'usuario',
        ]);

        $response = $this
            ->actingAs($user)
            ->get('/admin/users');

        $response->assertForbidden();
    }
}
