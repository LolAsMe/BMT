<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('transaksi_harian')->insert([
            ['kode'=>'000', 'debit'=>0,'kredit'=>0,'updated_at'=>now(),'created_at'=>now()],
        ]);
    }
}
