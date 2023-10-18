<?php

namespace Tests\Feature\Models;

use App\Models\Simpanan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DetailSimpananTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_detail_simpanan_page_can_be_rendered()
    {
        $this->actingAs($user = User::factory()->create());
        $simpanan = Simpanan::create([
            //
            'anggota_id'=>'2',
            'jenis_simpanan_id'=>'2',
            'jumlah'=>0,
            'tanggal_pembuatan'=>now(),
            'keterangan'=>'Testing',
        ]);
        $response = $this->get(route('simpanan.detail.index', $simpanan->id));

        $response->assertStatus(200);
    }

    public function test_create_detail_simpanan()
    {
        $simpanan = Simpanan::create([
            //
            'anggota_id'=>'2',
            'jenis_simpanan_id'=>'2',
            'jumlah'=>0,
            'tanggal_pembuatan'=>now(),
            'keterangan'=>'Testing',
        ]);
        $this->actingAs($user = User::factory()->create());
        $now = now()->format('Y-m-d H:i:s');


        $response = $this->post(route('simpanan.detail.store', $simpanan->id),  [
            //
            'kode' => 'SIMP1',
            'transaksi_id' => '1',
            'tanggal_transaksi' => now(),
            'tanggal_slip' => now(),
            'debit' => '1000',
            'kredit' => '0',
            'saldo_awal' => '1000',
            'saldo_akhir' => '2000',
            'keterangan' => 'test',
            'karyawan_id' => '1',

        ]);
        // $this->assertDatabaseCount('detail_simpanan', 1);
        $this->assertDatabaseHas('detail_simpanan', [
            //
            'kode'=>'SIMP1',
            'transaksi_id'=>'1',
            'tanggal_transaksi'=>now(),
            'tanggal_slip'=>now(),
            'debit'=>'1000',
            'kredit'=>'0',
            'saldo_awal'=>'1000',
            'saldo_akhir'=>'2000',
            'keterangan'=>'test',
            'karyawan_id'=>'1',

        ]);
    }

    public function test_edit_detail_simpanan()
    {

        $this->actingAs($user = User::factory()->create());
        $simpanan = Simpanan::create([
            //
            'anggota_id'=>'2',
            'jenis_simpanan_id'=>'2',
            'jumlah'=>0,
            'tanggal_pembuatan'=>now(),
            'keterangan'=>'Testing',
        ]);
        $now = now()->format('Y-m-d H:i:s');
        $simpananDetail = $simpanan->detail()->create([
            //
            'kode'=>'SIMP1',
            'transaksi_id'=>'1',
            'tanggal_transaksi'=>now(),
            'tanggal_slip'=>now(),
            'debit'=>'1500',
            'kredit'=>'0',
            'saldo_awal'=>'1000',
            'saldo_akhir'=>'2000',
            'keterangan'=>'test',
            'karyawan_id'=>'1',

        ]);
        $this->assertModelExists($simpananDetail);

        // dd(route('simpanan.detail.update', $simpananDetail->id));
        $response = $this->put(route('simpanan.detail.update', $simpananDetail->id), [
            //
            'kode'=>'SIMP1',
            'transaksi_id'=>'1',
            'tanggal_transaksi'=>now(),
            'tanggal_slip'=>now(),
            'debit'=>'1500',
            'kredit'=>'0',
            'saldo_awal'=>'1000',
            'saldo_akhir'=>'2500',
            'keterangan'=>'test',
            'karyawan_id'=>'1',

        ]);
        $this->assertDatabaseHas('detail_simpanan', [
            //
            'kode'=>'SIMP1',
            'transaksi_id'=>'1',
            'tanggal_transaksi'=>now(),
            'tanggal_slip'=>now(),
            'debit'=>'1500',
            'kredit'=>'0',
            'saldo_awal'=>'1000',
            'saldo_akhir'=>'2500',
            'keterangan'=>'test',
            'karyawan_id'=>'1',

        ]);
    }

    public function test_delete_detail_simpanan()
    {
        $this->actingAs($user = User::factory()->create());
        $simpanan = Simpanan::create([
            //
            'kode'=>'',
            'anggota_id'=>'2',
            'jenis_simpanan_id'=>'2',
            'jumlah'=>0,
            'tanggal_pembuatan'=>now(),
            'keterangan'=>'Testing',
        ]);
        $now = now()->format('Y-m-d H:i:s');
        $simpananDetail = $simpanan->detail()->create([
            //
            'kode'=>'SIMP1',
            'transaksi_id'=>'1',
            'tanggal_transaksi'=>now(),
            'tanggal_slip'=>now(),
            'debit'=>'1000',
            'kredit'=>'0',
            'saldo_awal'=>'1000',
            'saldo_akhir'=>'2000',
            'keterangan'=>'test',
            'karyawan_id'=>'1',

        ]);
        $this->assertModelExists($simpananDetail);
        $this->assertNotSoftDeleted($simpananDetail);
        // dd($simpananDetail);
        // dd(route('simpanan.detail.destroy', $simpananDetail->id));
        $response = $this->delete(route('simpanan.detail.destroy', $simpananDetail->id));
        $this->assertSoftDeleted($simpananDetail);
    }
}
