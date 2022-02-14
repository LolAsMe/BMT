<?php

namespace Tests\Feature\Models;

use App\Models\JenisSimpanan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JenisSimpananTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_jenisSimpanan_page_can_be_rendered()
    {
        $this->actingAs($user = User::factory()->create());
        $response = $this->get(route('jenis-simpanan.index'));

        $response->assertStatus(200);
    }

    public function test_create_jenisSimpanan()
    {
        $this->actingAs($user = User::factory()->create());
        $now = now()->format('Y-m-d H:i:s');

        $response = $this->post(route('jenis-simpanan.index'), [
            //
            'kode' => 'JPB01',
            'nama' => 'Normal',
            'bahas' => '1'
        ]);
        $this->assertDatabaseCount('jenis_simpanan', 1);
        $this->assertDatabaseHas('jenis_simpanan', [
            //
            'kode' => 'JPB01',
            'nama' => 'Normal',
            'bahas' => '1'
        ]);
    }

    public function test_edit_jenisSimpanan()
    {
        $this->actingAs($user = User::factory()->create());
        $now = now()->format('Y-m-d H:i:s');
        $jenisSimpanan = JenisSimpanan::create([
            //
            'kode' => 'JPB02',
            'nama' => 'Khusus',
            'bahas' => '2'
        ]);
        $this->assertModelExists($jenisSimpanan);

        $response = $this->put(route('jenis-simpanan.update', $jenisSimpanan->id), [
            //
            'kode' => 'JPB02',
            'nama' => 'Khusus',
            'bahas' => '1.5'
        ]);
        $this->assertDatabaseHas('jenis_simpanan', [
            //
            'kode' => 'JPB02',
            'nama' => 'Khusus',
            'bahas' => '1.5'
        ]);
    }

    public function test_delete_jenisSimpanan()
    {
        $this->actingAs($user = User::factory()->create());
        $jenisSimpanan = JenisSimpanan::create([
            //
            'kode' => 'JPB03',
            'nama' => 'Deleted',
            'bahas' => '99'
        ]);
        $this->assertModelExists($jenisSimpanan);
        $response = $this->delete(route('jenis-simpanan.destroy', $jenisSimpanan->id));
        $this->assertDeleted($jenisSimpanan);
    }
}
