<?php

namespace Tests\Feature\Models;

use App\Models\DetailNisbah;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DetailNisbahTest extends TestCase
{
    // /**
    //  * A basic feature test example.
    //  *
    //  * @return void
    //  */
    // public function test_cetak_page_can_be_rendered()
    // {
    //     $this->actingAs($user = User::factory()->create());
    //     $response = $this->get(route('nisbah.detail.index',1));

    //     $response->assertStatus(200);
    // }

    // public function test_create_cetak()
    // {
    //     $this->actingAs($user = User::factory()->create());
    //     $now = now()->format('Y-m-d H:i:s');

    //     $response = $this->post(route('nisbah.detail.index'), [
    //         //
    //         'pengendapan_id'=>'1',
    //         'detail_simpanan_id'=>'1',
    //         'pengendapan'=>'10000',
    //         'hasil'=>'10000',
    //     ]);
    //     $this->assertDatabaseCount('nisbah.detail', 1);
    //     $this->assertDatabaseHas('nisbah.detail', [
    //         //
    //         'pengendapan_id'=>'1',
    //         'detail_simpanan_id'=>'1',
    //         'pengendapan'=>'10000',
    //         'hasil'=>'10000',
    //     ]);
    // }

    // public function test_edit_cetak()
    // {
    //     $this->actingAs($user = User::factory()->create());
    //     $now = now()->format('Y-m-d H:i:s');
    //     $nisbahDetail = DetailNisbah::create([
    //         //
    //         'pengendapan_id'=>'2',
    //         'detail_simpanan_id'=>'2',
    //         'pengendapan'=>'10000',
    //         'hasil'=>'20000',
    //     ]);
    //     $this->assertModelExists($nisbahDetail);

    //     $response = $this->put(route('nisbah.detail.update', $nisbahDetail->id), [
    //         //
    //         'pengendapan_id'=>'2',
    //         'detail_simpanan_id'=>'2',
    //         'pengendapan'=>'20000',
    //         'hasil'=>'20000',
    //     ]);
    //     $this->assertDatabaseHas('nisbah.detail', [
    //         //
    //         'pengendapan_id'=>'2',
    //         'detail_simpanan_id'=>'2',
    //         'pengendapan'=>'20000',
    //         'hasil'=>'20000',
    //     ]);
    // }

    // public function test_delete_cetak()
    // {
    //     $this->actingAs($user = User::factory()->create());
    //     $nisbahDetail = DetailNisbah::create([
    //         //
    //         'pengendapan_id'=>'3',
    //         'detail_simpanan_id'=>'3',
    //         'pengendapan'=>'30000',
    //         'hasil'=>'30000',
    //     ]);
    //     $this->assertModelExists($nisbahDetail);
    //     $this->assertNotSoftDeleted($nisbahDetail);
    //     $response = $this->delete(route('nisbah.detail.destroy', $nisbahDetail->id));
    //     $this->assertSoftDeleted($nisbahDetail);
    // }
}
