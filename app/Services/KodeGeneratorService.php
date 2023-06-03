<?php

namespace App\Services;

use App\Models\DetailKas;
use App\Models\DetailLaba;
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
        } else if ($tipe == 'angsuran') {
            $transaksi = "ANG";
        } else if ($tipe == 'pembiayaan') {
            $transaksi = "PEM";
        }else if ($tipe == 'kas') {
            $transaksi = "KAS";
        } else {
            abort(404, $transaksi);
        }
        $prefix = $transaksi . $this->d  . $this->m . $this->y;
        $kode = UniqueIdGenerator::generate(['table' => 'transaksi', 'length' => 12, 'field' => 'kode', 'prefix' => $prefix, 'reset_on_change' => 'prefix']);
        return $kode;
    }
    public function generateKodePembiayaan($jenis_pembiayaan_id)
    {
        $kode = '';
        $lastKode = Pembiayaan::orderBy('id', 'desc')->take(1)->value('kode');
        $lastKode = substr($lastKode, (strrpos($lastKode, '.', 2) + 1));
        $kode = "PEM." . $this->m . "." . $this->y . "." . $jenis_pembiayaan_id . "." . ($lastKode + 1);
        return $kode;
    }
    public function generateKodeDetailPembiayaan($kode, $angsuranKe = 0)
    {
        $transaksi = '';
        $transaksi = "ANG.";
        $kode = $transaksi . $kode . "." . $angsuranKe;
        return $kode;
    }
    public function generateKodeNisbah()
    {
        $kode = UniqueIdGenerator::generate(['table' => 'nisbah', 'length' => 7, 'field' => 'kode', 'prefix' =>'NISB', 'reset_on_change' => 'prefix']);
        return $kode;
    }
    public function generateKodeDetailNisbah()
    {
        # code...
    }
    public function generateKodeKaryawan()
    {
        # code...
        $kode = UniqueIdGenerator::generate(['table' => 'karyawan', 'length' => 5, 'field' => 'kode', 'prefix' =>'KAR', 'reset_on_change' => 'prefix']);
        return $kode;
    }
    public function generateKodeDetailLaba()
    {
        # code...
        $kode = '';
        $lastKode = DetailLaba::orderBy('id', 'desc')->take(1)->first()->kode ?? 0;
        if($lastKode!=0){
            $lastKode = substr($lastKode, (strrpos($lastKode, '.', 2) + 1));
        }else{
            $lastKode=1;
        }
        // KAS ID Tanggal Bulan Tahun kode ID
        $kode = "LAB." .(string)$this->d . (string)$this->m . (string)$this->y . "." . ($lastKode + 1);
        return $kode;
    }
    public function generateDetailKas($kasID = '01', $jenisTransaksi = '01')
    {
        $kode = '';
        $lastKode = DetailKas::orderBy('id', 'desc')->take(1)->first()->kode ?? 0;
        if($lastKode!=0){
            $lastKode = substr($lastKode, (strrpos($lastKode, '.', 2) + 1));
        }else{
            $lastKode=1;
        }
        // KAS ID Tanggal Bulan Tahun kode ID
        $kode = "KAS." . $kasID . (string)$this->d . (string)$this->m . (string)$this->y . $jenisTransaksi . "." . ($lastKode + 1);
        return $kode;
    }
}
