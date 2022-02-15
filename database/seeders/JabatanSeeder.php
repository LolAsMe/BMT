<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JabatanSeeder extends Seeder
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
        Jabatan::insert([
            ['kode'=>'J01', 'nama'=>'Manajer','updated_at'=>now(),'created_at'=>now()],
            ['kode'=>'J02', 'nama'=>'Teller','updated_at'=>now(),'created_at'=>now()],
            ['kode'=>'J03', 'nama'=>'Accounting','updated_at'=>now(),'created_at'=>now()],
            ['kode'=>'J04', 'nama'=>'Funding','updated_at'=>now(),'created_at'=>now()],
            ['kode'=>'J05', 'nama'=>'Landing','updated_at'=>now(),'created_at'=>now()],
            ['kode'=>'J06', 'nama'=>'ACC','updated_at'=>now(),'created_at'=>now()],
            ['kode'=>'J07', 'nama'=>'ACCOUNTING','updated_at'=>now(),'created_at'=>now()],
        ]);
    }
}
