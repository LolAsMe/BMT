<?php

namespace Tests\Feature\Models;

use App\Models\Anggota;
use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AnggotaTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_anggota_page_can_be_rendered()
    {
        $this->actingAs($user = User::factory()->create());
        $response = $this->get('/anggota');

        $response->assertStatus(200);
    }

    public function test_create_anggota()
    {
        $this->actingAs($user = User::factory()->create());
        $now = now()->format('Y-m-d H:i:s');

        $response = $this->post(route('anggota.store'), [
            //
            'kode'=>'AG01',
            'nama'=>'Imam',
            'no_ktp'=>'0001',
            'alamat'=>'Bendan',
            'telepon'=>'08923134',
            'pekerjaan'=>'Petani',
            'tempat_lahir'=>'Bendan',
            'tanggal_lahir'=>$now,
            'nama_ibu_kandung'=>'Sutri',
            'jenis_kelamin'=>'pria',
            'karyawan_id'=>'1',
            'keterangan'=>'Test',
        ]);
        $this->assertDatabaseCount('anggota', 1);
        $this->assertDatabaseHas('anggota', [
            //
            'kode'=>'AG01',
            'nama'=>'Imam',
            'no_ktp'=>'0001',
            'alamat'=>'Bendan',
            'telepon'=>'08923134',
            'pekerjaan'=>'Petani',
            'tempat_lahir'=>'Bendan',
            'tanggal_lahir'=>$now,
            'nama_ibu_kandung'=>'Sutri',
            'jenis_kelamin'=>'pria',
            'karyawan_id'=>'1',
            'keterangan'=>'Test',
        ]);
    }

    public function test_edit_anggota()
    {
        $this->actingAs($user = User::factory()->create());
        $now = now();
        $Anggota = Anggota::create([
            //
            'kode'=>'AG01',
            'nama'=>'Imam',
            'no_ktp'=>'0001',
            'alamat'=>'Bendan',
            'telepon'=>'08923134',
            'pekerjaan'=>'Petani',
            'tempat_lahir'=>'Bendan',
            'tanggal_lahir'=>$now,
            'nama_ibu_kandung'=>'Sutri',
            'jenis_kelamin'=>'pria',
            'karyawan_id'=>'1',
            'keterangan'=>'Test',
        ]);
        $this->assertModelExists($Anggota);

        $response = $this->put(route('anggota.update', $Anggota->id), [
            //
            'kode'=>'AG01',
            'nama'=>'Imam',
            'no_ktp'=>'0001',
            'alamat'=>'Bendan',
            'telepon'=>'08923134',
            'pekerjaan'=>'Petani',
            'tempat_lahir'=>'Bendan',
            'tanggal_lahir'=>$now,
            'nama_ibu_kandung'=>'Sulastri',
            'jenis_kelamin'=>'pria',
            'karyawan_id'=>'1',
            'keterangan'=>'Test',
        ]);
        $this->assertDatabaseHas('anggota', [
            //
            'kode'=>'AG01',
            'nama'=>'Imam',
            'no_ktp'=>'0001',
            'alamat'=>'Bendan',
            'telepon'=>'08923134',
            'pekerjaan'=>'Petani',
            'tempat_lahir'=>'Bendan',
            'tanggal_lahir'=>$now,
            'nama_ibu_kandung'=>'Sulastri',
            'jenis_kelamin'=>'pria',
            'karyawan_id'=>'1',
            'keterangan'=>'Test',
        ]);
    }

    public function test_delete_anggota()
    {
        $this->actingAs($user = User::factory()->create());
        $Anggota = Anggota::create([
            //
            'kode'=>'AG01',
            'nama'=>'Imam',
            'no_ktp'=>'0001',
            'alamat'=>'Bendan',
            'telepon'=>'08923134',
            'pekerjaan'=>'Petani',
            'tempat_lahir'=>'Bendan',
            'tanggal_lahir'=>now(),
            'nama_ibu_kandung'=>'Sutri',
            'jenis_kelamin'=>'pria',
            'karyawan_id'=>'1',
            'keterangan'=>'Test',
        ]);
        $this->assertModelExists($Anggota);
        $this->assertNotSoftDeleted($Anggota);
        $response = $this->delete(route('anggota.destroy', $Anggota->id));
        $this->assertSoftDeleted($Anggota);
    }
}
