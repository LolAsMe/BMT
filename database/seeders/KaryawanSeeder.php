<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KaryawanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('karyawan')->insert([
            "kode" => "KAR01",
            "nama" => "Imam",
            "alamat" => "Boyolali",
            "no_telepon" => "08912389",
            "jabatan_id" => "1",
            "created_at"=>now(),
            'updated_at'=>now(),
        ]);
    }
}
