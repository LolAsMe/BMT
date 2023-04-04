<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // J01	Manajer
        // J02	Teller
        // J03	Accounting
        // J04	Funding
        // J05	Landing
        // J06	ACC
        // J07	ACCOUNTING
        DB::table('kas')->insert([
            ['kode'=>'kas', 'nama'=>'Kas Utama','updated_at'=>now(),'created_at'=>now(), 'jumlah'=>1000000000],
            ['kode'=>'kas1', 'nama'=>'Kas BMT','updated_at'=>now(),'created_at'=>now(), 'jumlah'=>50000000],
        ]);

    }
}
