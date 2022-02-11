<?php

namespace Tests\Feature\Models;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KaryawanTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_karyawan_page_can_be_rendered()
    {
        $this->actingAs($user = User::factory()->create());
        $response = $this->get('/karyawan');

        $response->assertStatus(200);
    }

    public function test_create_karyawan()
    {
        $this->actingAs($user = User::factory()->create());

        $response = $this->post('/karyawan', [

        ]);
        $response->assertStatus(200);
    }
}
