<?php

namespace Tests\Feature;

use App\Models\Jabatan;
use App\Models\Karyawan;
use App\Models\User;
use Database\Seeders\JabatanSeeder;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class UpdatePasswordTest extends TestCase
{
    use RefreshDatabase;

    public function test_password_can_be_updated()
    {
        $karyawan = Karyawan::factory()->create([
            'nama' => 'test',
        ]);
        // Run the seeder
        $this->seed(JabatanSeeder::class); // Replace with your seeder class name
        $this->actingAs($user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => bcrypt('password123'),
            'karyawan_id' => $karyawan->id
        ]));
        $user2 = User::factory()->create([
            'email' => 'test5@example.com',
            'password' => bcrypt('password123'),
        ]);
        // dd(Jabatan::all());
        $response = $this->put('/userupdate/'.$user2->id, [
            'name' => $user2->name,
            'email' => 'test@examp2le.com',
            'password' => 'new-password',
        ]);
        // dd($response->status());
        // dd($user2->fresh()->email);
        // dd('/userEdit/'.$user->id);

        $this->assertTrue(Hash::check('new-password', $user2->fresh()->password));
    }

    // public function test_current_password_must_be_correct()
    // {
    //     $this->actingAs($user = User::factory()->create());

    //     $response = $this->put('/user/password', [
    //         'current_password' => 'wrong-password',
    //         'password' => 'new-password',
    //         'password_confirmation' => 'new-password',
    //     ]);

    //     $response->assertSessionHasErrors();

    //     $this->assertTrue(Hash::check('password', $user->fresh()->password));
    // }

    // public function test_new_passwords_must_match()
    // {
    //     $this->actingAs($user = User::factory()->create());

    //     $response = $this->put('/user/password', [
    //         'current_password' => 'password',
    //         'password' => 'new-password',
    //         'password_confirmation' => 'wrong-password',
    //     ]);

    //     $response->assertSessionHasErrors();

    //     $this->assertTrue(Hash::check('password', $user->fresh()->password));
    // }
}
