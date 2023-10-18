<?php

namespace Tests\Feature;

use App\Models\Karyawan;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get(route('login'));
        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen()
    {
           // Create a user for testing
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
        ]);
        $karyawan = Karyawan::factory()->create([
            'nama' => 'test',
        ]);

        // Attempt to authenticate the user
        $response = $this->post('/login', [
            'email' => 'test@example.com',
            'password' => 'password123',
        ]);
        // Assert that the user is authenticated
        $this->assertAuthenticated();

        // Assert that the user is redirected to the home page or any other expected page
        $response->assertRedirect(RouteServiceProvider::HOME);

    }

    public function test_users_can_not_authenticate_with_invalid_password()
    {
        $user = User::factory()->create();

        $this->post('/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();
    }
}
