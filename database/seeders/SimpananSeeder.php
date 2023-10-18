<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class SimpananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('simpanan')->insert([
            ['kode'=>'06.23.01.01.03.001', 'anggota_id'=>'1','jenis_simpanan_id'=>1,'jumlah'=>0,'tanggal_pembuatan'=>now(),'keterangan'=>'SAS']
        ]);

    }
}
