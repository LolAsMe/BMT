<?php

namespace Database\Seeders;

use Hash;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'name' => 'admin5',
            'email' => 'admin5@admin.com',
            'karyawan_id' => 1,
            'email_verified_at' => now(),
            'password' => Hash::make('123456'), // password 123456
            'remember_token' => Str::random(10), 'updated_at' => now(), 'created_at' => now()
        ]);
    }
}
