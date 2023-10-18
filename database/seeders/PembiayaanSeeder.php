<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;

class PembiayaanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('pembiayaan')->insert([
            [
                'kode'=>'PEM.06.23.1.01',
                'anggota_id' => 1,
                'nomor' => '20220710',
                'jenis_pembiayaan_id' => '1',
                'karyawan_id' => '1',
                'tanggal_pinjam' => now(),
                'jumlah' => 100000,
                'tanggal_jatuh_tempo' => now()->addYear(1),
                'pokok' => 5000,
                'jasa' => 10000,
                'potongan_pembiayaan' => 0,
                'total_pembiayaan' => 520000,
                'frekuensi_angsuran' => 5,
                'jumlah_angsuran' => 203300,
                'angsuran_diterima' => 932018,
                'keterangan' => 'Berhasil',
                'status' => 'pending',
            ]
        ]);
    }
}
