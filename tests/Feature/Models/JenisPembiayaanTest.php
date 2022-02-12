<?php

namespace Tests\Feature\Models;

use App\Models\JenisPembiayaan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JenisPembiayaanTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_jenisPembiayaan_page_can_be_rendered()
    {
        $this->actingAs($user = User::factory()->create());
        $response = $this->get(route('jenis-pembiayaan.index'));

        $response->assertStatus(200);
    }

    public function test_create_jenisPembiayaan()
    {
        $this->actingAs($user = User::factory()->create());
        $now = now()->format('Y-m-d H:i:s');

        $response = $this->post(route('jenis-pembiayaan.index'), [
            //
            'kode' => 'JPB01',
            'nama' => 'Normal',
            'bahas' => '1'
        ]);
        $this->assertDatabaseCount('jenis_pembiayaan', 1);
        $this->assertDatabaseHas('jenis_pembiayaan', [
            //
            'kode' => 'JPB01',
            'nama' => 'Normal',
            'bahas' => '1'
        ]);
    }

    public function test_edit_jenisPembiayaan()
    {
        $this->actingAs($user = User::factory()->create());
        $now = now()->format('Y-m-d H:i:s');
        $jenisPembiayaan = JenisPembiayaan::create([
            //
            'kode' => 'JPB02',
            'nama' => 'Khusus',
            'bahas' => '2'
        ]);
        $this->assertModelExists($jenisPembiayaan);

        $response = $this->put(route('jenis-pembiayaan.update', $jenisPembiayaan->id), [
            //
            'kode' => 'JPB02',
            'nama' => 'Khusus',
            'bahas' => '1.5'
        ]);
        $this->assertDatabaseHas('jenis_pembiayaan', [
            //
            'kode' => 'JPB02',
            'nama' => 'Khusus',
            'bahas' => '1.5'
        ]);
    }

    public function test_delete_jenisPembiayaan()
    {
        $this->actingAs($user = User::factory()->create());
        $jenisPembiayaan = JenisPembiayaan::create([
            //
            'kode' => 'JPB03',
            'nama' => 'Deleted',
            'bahas' => '99'
        ]);
        $this->assertModelExists($jenisPembiayaan);
        $response = $this->delete(route('jenis-pembiayaan.destroy', $jenisPembiayaan->id));
        $this->assertDeleted($jenisPembiayaan);
    }
}
