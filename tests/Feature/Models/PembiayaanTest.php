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
            'kode'=>'PEM05',
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
        $response->assertSessionDoesntHaveErrors();
        $this->assertDatabaseHas('pembiayaan', [
            //
            'kode'=>'PEM05',
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
    }

    public function test_edit_pembiayaan()
    {
        $this->actingAs($user = User::factory()->create());
        $now = now();
        $Pembiayaan = Pembiayaan::create([
            //
            'kode'=>'PEM05',
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
        $this->assertModelExists($Pembiayaan);

        $response = $this->put(route('pembiayaan.update', $Pembiayaan->id), [
            //
            'kode'=>'PEM05',
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
            'frekuensi_angsuran'=>6,
            'jumlah_angsuran'=>203300,
            'angsuran_diterima'=>932018,
            'keterangan'=>'Berhasil',
            'status'=>'ongoing',
        ]);
        $this->assertDatabaseHas('pembiayaan', [
            //
            'kode'=>'PEM05',
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
            'frekuensi_angsuran'=>6,
            'jumlah_angsuran'=>203300,
            'angsuran_diterima'=>932018,
            'keterangan'=>'Berhasil',
            'status'=>'ongoing',
        ]);
    }

    public function test_delete_pembiayaan()
    {
        $this->actingAs($user = User::factory()->create());
        $Pembiayaan = Pembiayaan::create([
            //
            'kode'=>'PEM05',
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
            'frekuensi_angsuran'=>6,
            'jumlah_angsuran'=>203300,
            'angsuran_diterima'=>932018,
            'keterangan'=>'Berhasil',
            'status'=>'ongoing',
        ]);
        $this->assertModelExists($Pembiayaan);
        $this->assertNotSoftDeleted($Pembiayaan);
        $response = $this->delete(route('pembiayaan.destroy', $Pembiayaan->id));
        $this->assertSoftDeleted($Pembiayaan);
    }
}
