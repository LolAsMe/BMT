<?php

namespace Database\Seeders;

use App\Models\Karyawan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            JabatanSeeder::class,
            KaryawanSeeder::class,
            AnggotaSeeder::class,
            UserSeeder::class,
            KasSeeder::class,
            SimpananSeeder::class,
            PembiayaanSeeder::class,
            TransaksiSeeder::class,
            // CommentSeeder::class,
        ]);
    }
}
