<?php

namespace Tests\Feature\Models;

use App\Models\Nisbah;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class NisbahTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_nisbah_page_can_be_rendered()
    {
        $this->actingAs($user = User::factory()->create());
        $response = $this->get('/nisbah');

        $response->assertStatus(200);
    }

    public function test_create_nisbah()
    {
        $this->actingAs($user = User::factory()->create());
        $now = now()->format('Y-m-d H:i:s');

        $response = $this->post(route('nisbah.index'), [
            //
            'simpanan_id'=> "1",
            'tanggal_awal'=> now(),
            'tanggal_selesai'=> now()->addYear(),
            'awal'=> "123456",
        ]);
        $this->assertDatabaseHas('nisbah', [
            //
            'simpanan_id'=> "1",
            'awal'=> "123456",
        ]);
    }

    // public function test_edit_nisbah()
    // {
    //     $this->actingAs($user = User::factory()->create());
    //     $now = now()->format('Y-m-d H:i:s');
    //     $nisbah = Nisbah::first();
    //     $this->assertModelExists($nisbah);

    //     $response = $this->put(route('nisbah.update', $nisbah->id), [
    //         //
    //         'simpanan_id'=> "1",
    //         'tanggal_awal'=> now(),
    //         'tanggal_selesai'=> now()->addYear(),
    //         'awal'=> "100000",
    //     ]);
    //     $this->assertDatabaseHas('nisbah', [
    //         //
    //         'simpanan_id'=> "1",
    //         'tanggal_awal'=> now(),
    //         'tanggal_selesai'=> now()->addYear(),
    //         'awal'=> "100000",
    //     ]);
    // }

//     public function test_delete_nisbah()
//     {
//         $this->actingAs($user = User::factory()->create());
//         $nisbah = Nisbah::create([
//             //
//             'simpanan_id'=> "1",
//             'tanggal_awal'=> now(),
//             'tanggal_selesai'=> now()->addYear(),
//             'awal'=> "100000",
//         ]);
//         $this->assertModelExists($nisbah);
//         $this->assertNotSoftDeleted($nisbah);
//         $response = $this->delete(route('nisbah.destroy', $nisbah->id));
//         $this->assertSoftDeleted($nisbah);
//     }
}
