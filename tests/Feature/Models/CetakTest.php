<?php

namespace Tests\Feature\Models;

use App\Models\Cetak;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CetakTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_cetak_page_can_be_rendered()
    {
        $this->actingAs($user = User::factory()->create());
        $response = $this->get('/cetak');

        $response->assertStatus(200);
    }

    public function test_create_cetak()
    {
        $this->actingAs($user = User::factory()->create());
        $now = now()->format('Y-m-d H:i:s');

        $response = $this->post(route('cetak.index'), [
            //
            'kode' => 'CET01',
            'tanggal' => $now,
            'sandi' => '01',
            'debit' => 0,
            'kredit' => 0,
            'saldo' => '10000',
            'karyawan_id' => '1',
            'simpanan_id' => '1',
            'no_urut' => '3',
        ]);
        $this->assertDatabaseCount('cetak', 1);
        $this->assertDatabaseHas('cetak', [
            //
            'kode' => 'CET01',
            'tanggal' => $now,
            'sandi' => '01',
            'debit' => 0,
            'kredit' => 0,
            'saldo' => '10000',
            'karyawan_id' => '1',
            'simpanan_id' => '1',
            'no_urut' => '3',
        ]);
    }

    public function test_edit_cetak()
    {
        $this->actingAs($user = User::factory()->create());
        $now = now()->format('Y-m-d H:i:s');
        $cetak = Cetak::create([
            //
            'kode' => 'CET01',
            'tanggal' => $now,
            'sandi' => '01',
            'debit' => 0,
            'kredit' => 0,
            'saldo' => '10000',
            'karyawan_id' => '1',
            'simpanan_id' => '1',
            'no_urut' => '3',
        ]);
        $this->assertModelExists($cetak);

        $response = $this->put(route('cetak.update', $cetak->id), [
            //
            'kode' => 'CET01',
            'tanggal' => '2022-02-12 04:19:19',
            'sandi' => '01',
            'debit' => 0,
            'kredit' => 1000,
            'saldo' => '100000',
            'karyawan_id' => '1',
            'simpanan_id' => '1',
            'no_urut' => '3',
        ]);
        $this->assertDatabaseHas('cetak', [
            //
            'kode' => 'CET01',
            'tanggal' => '2022-02-12 04:19:19',
            'sandi' => '01',
            'debit' => '0.00',
            'kredit' => '1000.00',
            'saldo' => '100000.00',
            'karyawan_id' => '1',
            'simpanan_id' => '1',
            'no_urut' => '3',
        ]);
    }

    public function test_delete_cetak()
    {
        $this->actingAs($user = User::factory()->create());
        $cetak = Cetak::create([
            //
            'kode' => 'CET01',
            'tanggal' => now(),
            'sandi' => '01',
            'debit' => 0,
            'kredit' => 0,
            'saldo' => '10000',
            'karyawan_id' => '1',
            'simpanan_id' => '1',
            'no_urut' => '3',
        ]);
        $this->assertModelExists($cetak);
        $this->assertNotSoftDeleted($cetak);
        $response = $this->delete(route('cetak.destroy', $cetak->id));
        $this->assertSoftDeleted($cetak);
    }
}
