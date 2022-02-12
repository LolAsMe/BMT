<?php

namespace Tests\Feature\Models;

use App\Models\Jabatan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JabatanTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_jabatan_page_can_be_rendered()
    {
        $this->actingAs($user = User::factory()->create());
        $response = $this->get(route('jabatan.index'));

        $response->assertStatus(200);
    }

    public function test_create_jabatan()
    {
        $this->actingAs($user = User::factory()->create());
        $now = now()->format('Y-m-d H:i:s');

        $response = $this->post(route('jabatan.index'), [
            //
            'kode' => 'JAB01',
            'nama' => 'admin'
        ]);
        $this->assertDatabaseCount('jabatan', 1);
        $this->assertDatabaseHas('jabatan', [
            //
            'kode' => 'JAB01',
            'nama' => 'admin'
        ]);
    }

    public function test_edit_jabatan()
    {
        $this->actingAs($user = User::factory()->create());
        $now = now()->format('Y-m-d H:i:s');
        $jabatan = Jabatan::create([
            //
            'kode' => 'JAB02',
            'nama' => 'Salse'
        ]);
        $this->assertModelExists($jabatan);

        $response = $this->put(route('jabatan.update', $jabatan->id), [
            //
            'kode' => 'JAB02',
            'nama' => 'Sales'
        ]);
        $this->assertDatabaseHas('jabatan', [
            //
            'kode' => 'JAB02',
            'nama' => 'Sales'
        ]);
    }

    public function test_delete_jabatan()
    {
        $this->actingAs($user = User::factory()->create());
        $jabatan = Jabatan::create([
            //
            'kode' => 'CET03',
            'nama' => 'Calon',
        ]);
        $this->assertModelExists($jabatan);
        $response = $this->delete(route('jabatan.destroy', $jabatan->id));
        $this->assertDeleted($jabatan);
    }
}
