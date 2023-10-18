<?php

namespace Tests\Feature\Models;

use App\Models\Anggota;
use App\Models\Jabatan;
use App\Models\Karyawan;
use App\Models\Simpanan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class SimpananTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_simpanan_page_can_be_rendered()
    {
        $this->actingAs($user = User::factory()->create());
        $response = $this->get(route('simpanan.index'));

        $response->assertStatus(200);
    }

    public function test_create_simpanan()
    {
        $this->actingAs($user = User::factory()->create());
        $now = now()->format('Y-m-d H:i:s');

        $response = $this->post('/simpanan', [
            'anggota_id' => '4',
            'jenis_simpanan_id' => '1',
            'jumlah' => 0,
            'keterangan' => 'Testing2',
        ]);
        // dd($response->status());
        // dd(Simpanan::all());
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas('simpanan', [
            //
            'anggota_id' => '4',
            'jenis_simpanan_id' => '1',
            'jumlah' => 0,
            'keterangan' => 'Testing2',
        ]);
    }

    public function test_edit_simpanan()
    {
        $this->actingAs($user = User::factory()->create());
        $now = now();
        $Simpanan = Simpanan::create([
            //
            'anggota_id' => '2',
            'jenis_simpanan_id' => '2',
            'jumlah' => 0,
            'tanggal_pembuatan' => now(),
            'keterangan' => 'Testing',
        ]);
        $this->assertModelExists($Simpanan);

        $response = $this->put(route('simpanan.update', $Simpanan->id), [
            //
            'anggota_id' => '2',
            'jenis_simpanan_id' => '2',
            'jumlah' => 0,
            'tanggal_pembuatan' => now(),
            'keterangan' => 'Testing',
        ]);
        $this->assertDatabaseHas('simpanan', [
            //
            'anggota_id' => '2',
            'jenis_simpanan_id' => '2',
            'jumlah' => 0,
            'tanggal_pembuatan' => now(),
            'keterangan' => 'Testing',
        ]);
    }

    public function test_delete_simpanan()
    {
        $this->actingAs($user = User::factory()->create());
        $Simpanan = Simpanan::create([
            //
            'anggota_id' => '2',
            'jenis_simpanan_id' => '2',
            'jumlah' => 0,
            'tanggal_pembuatan' => now(),
            'keterangan' => 'Testing',
        ]);
        $this->assertModelExists($Simpanan);
        $this->assertNotSoftDeleted($Simpanan);
        $response = $this->delete(route('simpanan.destroy', $Simpanan->id));
        $this->assertSoftDeleted($Simpanan);
    }
}
