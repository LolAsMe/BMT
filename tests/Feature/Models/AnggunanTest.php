<?php

namespace Tests\Feature\Models;

use App\Models\Anggunan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AnggunanTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_anggunan_page_can_be_rendered()
    {
        $this->actingAs($user = User::factory()->create());
        $response = $this->get('/anggunan');

        $response->assertStatus(200);
    }

    public function test_create_anggunan()
    {
        $this->actingAs($user = User::factory()->create());
        $now = now()->format('Y-m-d H:i:s');

        $response = $this->post(route('anggunan.store'), [
            //
            'pembiayaan_id'=>'1',
            'kode'=>'test1',
            'jenis_objek'=>'test1',
            'nomor_polisi'=>'2139',
            'tanggal_masuk'=>$now,
            'tahun_pembuatan'=>'2012',
            'luas_objek'=>'100m',
            'letak_objek'=>'Indonesia',
            'nama_pemilik'=>'Imam',
            'alamat_pemilik'=>'Bendan',
        ]);
        $this->assertDatabaseCount('anggunan', 1);
        $this->assertDatabaseHas('anggunan', [
            //
            'pembiayaan_id'=>'1',
            'kode'=>'test1',
            'jenis_objek'=>'test1',
            'nomor_polisi'=>'2139',
            'tanggal_masuk'=>$now,
            'tahun_pembuatan'=>'2012',
            'luas_objek'=>'100m',
            'letak_objek'=>'Indonesia',
            'nama_pemilik'=>'Imam',
            'alamat_pemilik'=>'Bendan',
        ]);
    }

    public function test_edit_anggunan()
    {
        $this->actingAs($user = User::factory()->create());
        $now = now()->format('Y-m-d H:i:s');
        $anggunan = Anggunan::create([
            //
            'pembiayaan_id'=>'1',
            'kode'=>'AG02',
            'jenis_objek'=>'test1',
            'nomor_polisi'=>'2139',
            'tanggal_masuk'=>$now,
            'tahun_pembuatan'=>'2012',
            'luas_objek'=>'100m',
            'letak_objek'=>'Indonesia',
            'nama_pemilik'=>'Imam',
            'alamat_pemilik'=>'Bendan',
        ]);
        $this->assertModelExists($anggunan);

        $response = $this->put(route('anggunan.update', $anggunan->id), [
            //
            'pembiayaan_id'=>'1',
            'kode'=>'AG02',
            'jenis_objek'=>'test5',
            'nomor_polisi'=>'2139',
            'tanggal_masuk'=>$now,
            'tanggal_ambil'=>$now,
            'tahun_pembuatan'=>'2012',
            'luas_objek'=>'100m',
            'letak_objek'=>'Indonesia',
            'nama_pemilik'=>'Imam',
            'alamat_pemilik'=>'Bendan',
            'karyawan_id'=>'1',
        ]);
        $this->assertDatabaseHas('anggunan', [
            //
            'pembiayaan_id'=>'1',
            'kode'=>'AG02',
            'jenis_objek'=>'test5',
            'nomor_polisi'=>'2139',
            'tanggal_masuk'=>$now,
            'tanggal_ambil'=>$now,
            'tahun_pembuatan'=>'2012',
            'luas_objek'=>'100m',
            'letak_objek'=>'Indonesia',
            'nama_pemilik'=>'Imam',
            'alamat_pemilik'=>'Bendan',
            'karyawan_id'=>'1',
        ]);
    }

    public function test_delete_anggunan()
    {
        $this->actingAs($user = User::factory()->create());
        $anggunan = Anggunan::create([
            //
            'pembiayaan_id'=>'2',
            'kode'=>'AG05',
            'jenis_objek'=>'test5',
            'nomor_polisi'=>'2139',
            'tanggal_masuk'=>now(),
            'tanggal_ambil'=>now(),
            'tahun_pembuatan'=>'2012',
            'luas_objek'=>'100m',
            'letak_objek'=>'Indonesia',
            'nama_pemilik'=>'Imam',
            'alamat_pemilik'=>'Bendan',
            'karyawan_id'=>'1',
        ]);
        $this->assertModelExists($anggunan);
        $this->assertNotSoftDeleted($anggunan);
        $response = $this->delete(route('anggunan.destroy', $anggunan->id));
        $this->assertSoftDeleted($anggunan);
    }
}
