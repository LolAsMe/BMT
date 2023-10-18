<?php

namespace Tests\Feature\Models;

use App\Models\Pembiayaan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class DetailPembiayaanTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_detail_pembiayaan_page_can_be_rendered()
    {
        $this->actingAs($user = User::factory()->create());
        $pembiayaan = Pembiayaan::create([
            //
            'kode'=>'PEM01',
            'nomor'=>'20220710',
            'jenis_pembiayaan_id'=>'1',
            'simpanan_id'=>'1',
            'karyawan_id'=>'1',
            'tanggal_pinjam'=>now(),
            'jumlah'=>100000,
            'tanggal_jatuh_tempo'=>now()->addYear(1),
            'pokok'=>5000,
            'jasa'=>10000,
            'potongan_pembiayaan'=>0,
            'total_pembiayaan'=>520000,
            'frekuensi_angsuran'=>5,
            'jumlah_angsuran'=>203300,
            'angsuran_diterima'=>932018,
            'keterangan'=>'Berhasil',
            'status'=>'pending',
        ]);
        $response = $this->get(route('pembiayaan.detail.index',$pembiayaan->id));

        $response->assertStatus(200);
    }

    public function test_create_detail_pembiayaan()
    {
        $pembiayaan = Pembiayaan::create([
            //
            'kode'=>'PEM01',
            'nomor'=>'20220710',
            'jenis_pembiayaan_id'=>'1',
            'simpanan_id'=>'1',
            'karyawan_id'=>'1',
            'tanggal_pinjam'=>now(),
            'jumlah'=>100000,
            'tanggal_jatuh_tempo'=>now()->addYear(1),
            'pokok'=>5000,
            'jasa'=>10000,
            'potongan_pembiayaan'=>0,
            'total_pembiayaan'=>520000,
            'frekuensi_angsuran'=>5,
            'jumlah_angsuran'=>203300,
            'angsuran_diterima'=>932018,
            'keterangan'=>'Berhasil',
            'status'=>'pending',
        ]);
        $this->actingAs($user = User::factory()->create());
        $now = now()->format('Y-m-d H:i:s');


        $response = $this->post(route('pembiayaan.detail.store',$pembiayaan->id), [
            //
            'karyawan_id'=>'1',
            'angsuran_ke'=>'1',
            'jumlah'=>'10000',
            'akumulasi_angsuran'=>'1',
            'total_tanggungan'=>'10000',
            'keterangan'=>'test',
        ]);
        // $this->assertDatabaseCount('detail_pembiayaan', 1);
        $this->assertDatabaseHas('detail_pembiayaan', [
            //
            'karyawan_id'=>'1',
            'angsuran_ke'=>'1',
            'jumlah'=>'10000',
            'akumulasi_angsuran'=>'1',
            'total_tanggungan'=>'10000',
            'keterangan'=>'test',
        ]);
    }

    public function test_edit_detail_pembiayaan()
    {

        $this->actingAs($user = User::factory()->create());
        $pembiayaan = Pembiayaan::create([
            //
            'kode'=>'PEM01',
            'nomor'=>'20220710',
            'jenis_pembiayaan_id'=>'1',
            'simpanan_id'=>'1',
            'karyawan_id'=>'1',
            'tanggal_pinjam'=>now(),
            'jumlah'=>100000,
            'tanggal_jatuh_tempo'=>now()->addYear(1),
            'pokok'=>5000,
            'jasa'=>10000,
            'potongan_pembiayaan'=>0,
            'total_pembiayaan'=>520000,
            'frekuensi_angsuran'=>5,
            'jumlah_angsuran'=>203300,
            'angsuran_diterima'=>932018,
            'keterangan'=>'Berhasil',
            'status'=>'pending',
        ]);
        $now = now()->format('Y-m-d H:i:s');
        $pembiayaanDetail = $pembiayaan->detail()->create([
            //
            'karyawan_id'=>'1',
            'angsuran_ke'=>'1',
            'jumlah'=>'10000',
            'akumulasi_angsuran'=>'1',
            'total_tanggungan'=>'10000',
            'keterangan'=>'test',
        ]);
        $this->assertModelExists($pembiayaanDetail);

        // dd(route('pembiayaan.detail.update', $pembiayaanDetail->id));
        $response = $this->put(route('pembiayaan.detail.update', $pembiayaanDetail->id), [
            //
            'karyawan_id'=>'1',
            'angsuran_ke'=>'1',
            'jumlah'=>'10000',
            'akumulasi_angsuran'=>'1',
            'total_tanggungan'=>'10000',
            'keterangan'=>'test2',
        ]);
        $this->assertDatabaseHas('detail_pembiayaan', [
            //
            'karyawan_id'=>'1',
            'angsuran_ke'=>'1',
            'jumlah'=>'10000',
            'akumulasi_angsuran'=>'1',
            'total_tanggungan'=>'10000',
            'keterangan'=>'test2',
        ]);
    }

    public function test_delete_detail_pembiayaan()
    {
        $this->actingAs($user = User::factory()->create());
        $pembiayaan = Pembiayaan::create([
            //
            'kode'=>'PEM01',
            'nomor'=>'20220710',
            'jenis_pembiayaan_id'=>'1',
            'simpanan_id'=>'1',
            'karyawan_id'=>'1',
            'tanggal_pinjam'=>now(),
            'jumlah'=>100000,
            'tanggal_jatuh_tempo'=>now()->addYear(1),
            'pokok'=>5000,
            'jasa'=>10000,
            'potongan_pembiayaan'=>0,
            'total_pembiayaan'=>520000,
            'frekuensi_angsuran'=>5,
            'jumlah_angsuran'=>203300,
            'angsuran_diterima'=>932018,
            'keterangan'=>'Berhasil',
            'status'=>'pending',
        ]);
        $now = now()->format('Y-m-d H:i:s');
        $pembiayaanDetail = $pembiayaan->detail()->create([
            //
            'karyawan_id'=>'1',
            'angsuran_ke'=>'1',
            'jumlah'=>'10000',
            'akumulasi_angsuran'=>'1',
            'total_tanggungan'=>'10000',
            'keterangan'=>'test',
        ]);
        $this->assertModelExists($pembiayaanDetail);
        $this->assertNotSoftDeleted($pembiayaanDetail);
        // dd($pembiayaanDetail);
        // dd(route('pembiayaan.detail.destroy', $pembiayaanDetail->id));
        $response = $this->delete(route('pembiayaan.detail.destroy', $pembiayaanDetail->id));
        $this->assertSoftDeleted($pembiayaanDetail);
    }
}
