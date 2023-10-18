<?php

namespace Tests\Feature\Models;

use App\Models\Pembiayaan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class PembiayaanTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_pembiayaan_page_can_be_rendered()
    {
        $this->actingAs($user = User::factory()->create());
        $response = $this->get('/pembiayaan');

        $response->assertStatus(200);
    }

    public function test_create_pembiayaan()
    {
        $this->actingAs($user = User::factory()->create());
        $now = now()->format('Y-m-d H:i:s');

        $response = $this->post(route('pembiayaan.store'), [
            //
            'anggota_id'=>1,
            'nomor'=>'20220710',
            'jenis_pembiayaan_id'=>'1',
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
            'keterangan'=>'Berhasil',
        ]);
        // dd(Pembiayaan::all());

        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas('pembiayaan', [
            //
            'anggota_id'=>1,
            'nomor'=>'20220710',
            'jenis_pembiayaan_id'=>'1',
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
            'keterangan'=>'Berhasil',
        ]);
    }

    // public function test_edit_pembiayaan()
    // {
    //     $this->actingAs($user = User::factory()->create());
    //     $now = now();
    //    $pembiayaan = Pembiayaan::first();
    //     $this->assertModelExists($pembiayaan);

    //     $response = $this->put(route('pembiayaan.update', $pembiayaan->id), [
    //         //
    //         'nomor'=>'20220719',
    //     ]);
    //     $this->assertDatabaseHas('pembiayaan', [
    //         //
    //         'nomor'=>'20220719',
    //     ]);
    // }

    public function test_delete_pembiayaan()
    {
        $this->actingAs($user = User::factory()->create());

        // $pembiayaan = Pembiayaan::create([
        //     //
        //     'anggota_id'=>1,
        //     'nomor'=>'20220710',
        //     'jenis_pembiayaan_id'=>'1',
        //     'karyawan_id'=>'1',
        //     'tanggal_pinjam'=>now(),
        //     'jumlah'=>100000,
        //     'tanggal_jatuh_tempo'=>now()->addYear(1),
        //     'pokok'=>5000,
        //     'jasa'=>10000,
        //     'potongan_pembiayaan'=>0,
        //     'total_pembiayaan'=>520000,
        //     'frekuensi_angsuran'=>6,
        //     'jumlah_angsuran'=>203300,
        //     'angsuran_diterima'=>932018,
        //     'keterangan'=>'Berhasil',
        //     'status'=>'ongoing',
        // ]);
        $pembiayaan=Pembiayaan::first();
        // dd($pembiayaan);

        $this->assertModelExists($pembiayaan);
        $this->assertNotSoftDeleted($pembiayaan);
        $response = $this->delete(route('pembiayaan.destroy', $pembiayaan->id));
        $this->assertSoftDeleted($pembiayaan);
    }
}
