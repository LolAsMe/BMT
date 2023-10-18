<?php

namespace Tests\Feature\Models;

use App\Models\DetailNisbah;
use App\Models\Nisbah;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DetailNisbahTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    // public function test_detail_nisbah_page_can_be_rendered()
    // {
    //     $this->actingAs($user = User::factory()->create());
    //     $nisbah = Nisbah::create([
    //         //
    //         'kode' => 'NIS01',
    //         'bulan' => '2020-01',
    //         'simpanan_id' => '3',
    //         'pengendapan' => 1000,
    //         'tabungan' => 50000,
    //         'nisbah' => '10000',
    //     ]);
    //     $response = $this->get(route('nisbah.detail.index',$nisbah->id));

    //     $response->assertStatus(200);
    // }

    // public function test_create_detail_nisbah()
    // {
    //     $nisbah = Nisbah::create([
    //         //
    //         'kode' => 'NIS01',
    //         'bulan' => '2020-01',
    //         'simpanan_id' => '3',
    //         'pengendapan' => 1000,
    //         'tabungan' => 50000,
    //         'nisbah' => '10000',
    //     ]);
    //     $this->actingAs($user = User::factory()->create());
    //     $now = now()->format('Y-m-d H:i:s');


    //     $response = $this->post(route('nisbah.detail.store',$nisbah->id), [
    //         //
    //         'pengendapan_id'=>'1',
    //         'detail_simpanan_id'=>'1',
    //         'pengendapan'=>'10000',
    //         'hasil'=>'10000',
    //     ]);
    //     // $this->assertDatabaseCount('detail_nisbah', 1);
    //     $this->assertDatabaseHas('detail_nisbah', [
    //         //
    //         'pengendapan_id'=>'1',
    //         'detail_simpanan_id'=>'1',
    //         'pengendapan'=>'10000',
    //         'hasil'=>'10000',
    //     ]);
    // }

    // public function test_edit_detail_nisbah()
    // {

    //     $this->actingAs($user = User::factory()->create());
    //     $nisbah = Nisbah::create([
    //         //
    //         'kode' => 'NIS01',
    //         'bulan' => '2020-01',
    //         'simpanan_id' => '3',
    //         'pengendapan' => 1000,
    //         'tabungan' => 50000,
    //         'nisbah' => '10000',
    //     ]);
    //     $now = now()->format('Y-m-d H:i:s');
    //     $nisbahDetail = $nisbah->detail()->create([
    //         //
    //         'pengendapan_id'=>'2',
    //         'detail_simpanan_id'=>'2',
    //         'pengendapan'=>'20000',
    //         'hasil'=>'20000',
    //     ]);
    //     $this->assertModelExists($nisbahDetail);

    //     // dd(route('nisbah.detail.update', $nisbahDetail->id));
    //     $response = $this->put(route('nisbah.detail.update', $nisbahDetail->id), [
    //         //
    //         'pengendapan_id'=>'2',
    //         'detail_simpanan_id'=>'2',
    //         'pengendapan'=>'10000',
    //         'hasil'=>'20000',
    //     ]);
    //     $this->assertDatabaseHas('detail_nisbah', [
    //         //
    //         'pengendapan_id'=>'2',
    //         'detail_simpanan_id'=>'2',
    //         'pengendapan'=>'10000',
    //         'hasil'=>'20000',
    //     ]);
    // }

    // public function test_delete_detail_nisbah()
    // {
    //     $this->actingAs($user = User::factory()->create());
    //     $nisbah = Nisbah::create([
    //         //
    //         'kode' => 'NIS01',
    //         'bulan' => '2020-01',
    //         'simpanan_id' => '3',
    //         'pengendapan' => 1000,
    //         'tabungan' => 50000,
    //         'nisbah' => '10000',
    //     ]);
    //     $now = now()->format('Y-m-d H:i:s');
    //     $nisbahDetail = $nisbah->detail()->create([
    //         //
    //         'pengendapan_id'=>'2',
    //         'detail_simpanan_id'=>'2',
    //         'pengendapan'=>'10000',
    //         'hasil'=>'20000',
    //     ]);
    //     $this->assertModelExists($nisbahDetail);
    //     $this->assertNotSoftDeleted($nisbahDetail);
    //     // dd($nisbahDetail);
    //     // dd(route('nisbah.detail.destroy', $nisbahDetail->id));
    //     $response = $this->delete(route('nisbah.detail.destroy', $nisbahDetail->id));
    //     $this->assertSoftDeleted($nisbahDetail);
    // }
}
