<?php

namespace App\Services;

use App\Models\Pembiayaan;
use DB;
use sirajcse\UniqueIdGenerator\UniqueIdGenerator;

class KodeGeneratorService
{
    private $m;
    private $d;
    private $y;
    public function __construct()
    {
        $this->m = now()->format('m');
        $this->d = now()->format('d');
        $this->y = now()->format('y');
    }

    public function generateKodeAnggota()
    {
        return UniqueIdGenerator::generate(['table' => 'anggota', 'length' => 7, 'field' => 'kode', 'prefix' => 'AG.', 'reset_on_change' => 'prefix']);
    }

    public function generateKodeSimpanan($jenis_simpanan_id)
    {
        # code...
        $firstGap = DB::select("WITH gaps AS
        (
            SELECT
                LAG(CONVERT(SUBSTRING_INDEX(kode,'.',-1),UNSIGNED INTEGER), 1, 0) OVER(ORDER BY CONVERT(SUBSTRING_INDEX(kode,'.',-1),UNSIGNED INTEGER)) AS gap_begin,
                CONVERT(SUBSTRING_INDEX(kode,'.',-1),UNSIGNED INTEGER) AS gap_end,
                CONVERT(SUBSTRING_INDEX(kode,'.',-1),UNSIGNED INTEGER) - LAG(CONVERT(SUBSTRING_INDEX(kode,'.',-1),UNSIGNED INTEGER), 1, 0) OVER(ORDER BY CONVERT(SUBSTRING_INDEX(kode,'.',-1),UNSIGNED INTEGER)) AS gap
            FROM simpanan
        )
        SELECT
            gap_begin as first_gap
        FROM gaps
        WHERE gap > 1 limit 1
        ;");
        $jenis_simpanan_id < 10 ? $jenis_simpanan_id = "0" . $jenis_simpanan_id : $jenis_simpanan_id = $jenis_simpanan_id;
        $id = $firstGap[0]->first_gap + 1;
        $kode =  $this->m . "." . $this->y . ".01." . $jenis_simpanan_id . ".03." . $id;
        return $kode;
    }
    public function generateKodeDetailSimpanan($tipe = 'setoran', $kode)
    {
        $transaksi = '';
        if ($tipe == 'setoran') {
            $transaksi = 'SET';
        } else if ($tipe == 'penarikan') {
            $transaksi = "PEN";
        } else {
            abort(404);
        }
        $prefix = $transaksi . $kode;
        $kode = UniqueIdGenerator::generate(['table' => 'detail_simpanan', 'length' => 12, 'field' => 'kode', 'prefix' => $prefix, 'reset_on_change' => 'prefix']);
        return $kode;
    }
    public function generateKodeTransaksi($tipe = 'setoran')
    {
        $transaksi = '';
        $kode = "";
        if ($tipe == 'setoran') {
            $transaksi = 'SET';
        } else if ($tipe == 'penarikan') {
            $transaksi = "PEN";
        } else {
            abort(404);
        }
        $prefix = $transaksi . $this->d  . $this->m . $this->y;
        $kode = UniqueIdGenerator::generate(['table' => 'detail_simpanan', 'length' => 12, 'field' => 'kode', 'prefix' => $prefix, 'reset_on_change' => 'prefix']);
        return $kode;
    }
    public function generateKodePembiayaan($jenis_pembiayaan_id)
    {
        $kode = '';
        $lastKode = Pembiayaan::orderBy('id','desc')->take(1)->value('kode');
        $lastKode = substr($lastKode,(strrpos($lastKode, '.',2)+1));
        $kode = "PEM.".$this->m.".".$this->y.".".$jenis_pembiayaan_id.".".($lastKode+1);
        return $kode;
    }
    public function generateKodeDetailPembiayaan()
    {
        # code...
    }
    public function generateKodeNisbah()
    {
        # code...
    }
    public function generateKodeDetailNisbah()
    {
        # code...
    }
    public function generateKodeKaryawan()
    {
        # code...
    }
    public function generateKodeLaba()
    {
        # code...
    }
    public function generateKodeDetailLaba()
    {
        # code...
    }
}
