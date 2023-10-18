<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('anggota')->insert(
            [
                [
                    'kode' => 'kodeB',
                    'nama' => 'WahyuG',
                    'no_ktp' => '193912',
                    'alamat' => 'ewiur',
                    'telepon' => 'ewiur',
                    'pekerjaan' => 'ewiur',
                    'tempat_lahir' => 'ewiur',
                    'tanggal_lahir' => now(),
                    'tanggal_masuk' => now(),
                    'nama_ibu_kandung' => 'ibu',
                    'jenis_kelamin' => 'pria',
                    'karyawan_id' => 1,
                    'keterangan' => 'iwe',
                ],
                [
                    'kode' => 'kodeC',
                    'nama' => 'WahyuF',
                    'no_ktp' => '193912',
                    'alamat' => 'ewiur',
                    'telepon' => 'ewiur',
                    'pekerjaan' => 'ewiur',
                    'tempat_lahir' => 'ewiur',
                    'tanggal_lahir' => now(),
                    'tanggal_masuk' => now(),
                    'nama_ibu_kandung' => 'ibu',
                    'jenis_kelamin' => 'pria',
                    'karyawan_id' => 1,
                    'keterangan' => 'iwe',
                ],
                [
                    'kode' => 'kodeD',
                    'nama' => 'WahyuD',
                    'no_ktp' => '193912',
                    'alamat' => 'ewiur',
                    'telepon' => 'ewiur',
                    'pekerjaan' => 'ewiur',
                    'tempat_lahir' => 'ewiur',
                    'tanggal_lahir' => now(),
                    'tanggal_masuk' => now(),
                    'nama_ibu_kandung' => 'ibu',
                    'jenis_kelamin' => 'pria',
                    'karyawan_id' => 1,
                    'keterangan' => 'iwe',
                ],
                [
                    'kode' => 'kodeE',
                    'nama' => 'WahyuS',
                    'no_ktp' => '193912',
                    'alamat' => 'ewiur',
                    'telepon' => 'ewiur',
                    'pekerjaan' => 'ewiur',
                    'tempat_lahir' => 'ewiur',
                    'tanggal_lahir' => now(),
                    'tanggal_masuk' => now(),
                    'nama_ibu_kandung' => 'ibu',
                    'jenis_kelamin' => 'pria',
                    'karyawan_id' => 1,
                    'keterangan' => 'iwe',
                ]
            ]

        );
    }
}
