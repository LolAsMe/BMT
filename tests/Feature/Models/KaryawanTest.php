<?php

namespace Tests\Feature\Models;

use App\Models\Karyawan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KaryawanTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_karyawan_page_can_be_rendered()
    {
        $this->actingAs($user = User::factory()->create());
        $response = $this->get('/karyawan');

        $response->assertStatus(200);
    }

    public function test_create_karyawan()
    {
        $this->actingAs($user = User::factory()->create());

        $response = $this->post(route('karyawan.index'), [
            "nama" => "Imam 123",
            "alamat" => "Boyolali",
            "no_telepon" => "0891238923",
            "jabatan_id" => "2"
        ]);
        $this->assertDatabaseHas('karyawan', [
            "nama" => "Imam 123",
            "alamat" => "Boyolali",
            "no_telepon" => "0891238923",
            "jabatan_id" => "2"
        ]);
    }

    public function test_edit_karyawan()
    {
        $this->actingAs($user = User::factory()->create());

        $Karyawan = Karyawan::create([
            "kode" => "KR02",
            "nama" => "Abdul",
            "alamat" => "Banyudono",
            "no_telepon" => "08912389",
            "jabatan_id" => "2"
        ]);
        $this->assertModelExists($Karyawan);

        $response = $this->put(route('karyawan.update', $Karyawan->id), [
            "kode" => "KR01",
            "nama" => "Imam",
            "alamat" => "Boyolali",
            "no_telepon" => "089529029404",
            "jabatan_id" => "2"
        ]);
        $this->assertDatabaseHas('karyawan', [
            "kode" => "KR01",
            "nama" => "Imam",
            "alamat" => "Boyolali",
            "no_telepon" => "089529029404",
            "jabatan_id" => "2"
        ]);
    }

    public function test_delete_karyawan()
    {
        $this->actingAs($user = User::factory()->create());
        $Karyawan = Karyawan::create([
            "kode" => "KR03",
            "nama" => "Aziz",
            "alamat" => "Jawa",
            "no_telepon" => "0891234567",
            "jabatan_id" => "3"
        ]);
        $this->assertModelExists($Karyawan);
        $this->assertNotSoftDeleted($Karyawan);
        $response = $this->delete(route('karyawan.destroy', $Karyawan->id));
        $this->assertSoftDeleted($Karyawan);
    }
}
