<?php

namespace App\Services;

use App\Models\Anggota;
use App\Models\Kas;
use App\Models\Simpanan;

class BMTService
{
    private string $default_password;
    private Simpanan $curSimpanan;
    private $kasUtama;
    private $kasBMT;
    private $user;
    public function __construct($default_password = '123456')
    {
        $this->default_password = $default_password;
        // $this->currentSimpanan = Simpanan::find(1);
        $this->user= auth('web')->user();
        $this->kasUtama= Kas::find(1);
        $this->kasBMT= Kas::find(2);
    }
    public function searchAnggota(?array $parameter = [])
    {
        $anggotas = Anggota::searchAnggota($parameter);
        $anggotas->whereDoesntHave('group');
        return $anggotas->with('simpanan')->take(20)->get();
    }

    public function setCurrentSimpanan(Simpanan $simpanan)
    {
        $this->curSimpanan = $simpanan;
        return $this;
    }
    public function setor(int $jumlahSetoran)
    {
        $this->curSimpanan->detail()->create([
            'kode' => 'kode1',
            'tanggal_transaksi' => now(),
            'tanggal_slip' => now(),
            'debit' => 0,
            'kredit' => $jumlahSetoran,
            'saldo_awal' => $this->curSimpanan->jumlah,
            'saldo_akhir' => $this->curSimpanan->jumlah + $jumlahSetoran,
            'keterangan' => 'OK',
            'karyawan_id' => $this->user->karyawan_id,

        ]);
        $detail = $this->curSimpanan->detail()->latest()->first();
        $detail->transaksi()->create(
            [
                'kode' => 'kode1',
                'nama' =>'SET Mudhorobah',
                'keterangan'=>'OK',
                'debit'=>$jumlahSetoran,
                'kredit'=>0,
                'tanggal_transaksi'=>now(),
                'tanggal_slip'=>now(),
                'karyawan_id'=>$this->user->karyawan_id,
            ]
        );
        $this->curSimpanan->increment('jumlah', $jumlahSetoran);
    }

    public function tarik(int $jumlahTarikan)
    {
        $this->curSimpanan->detail()->create([
            'kode' => 'kode1',
            'tanggal_transaksi' => now(),
            'tanggal_slip' => now(),
            'debit' => $jumlahTarikan,
            'kredit' => 0,
            'saldo_awal' => $this->curSimpanan->jumlah,
            'saldo_akhir' => $this->curSimpanan->jumlah - $jumlahTarikan,
            'keterangan' => 'OK',
            'karyawan_id' => $this->user->karyawan_id,

        ]);
        $detail = $this->curSimpanan->detail()->latest()->first();
        $detail->transaksi()->create(
            [
                'kode' => 'kode1',
                'nama' =>'SET Mudhorobah',
                'keterangan'=>'OK',
                'debit'=>0,
                'kredit'=>$jumlahTarikan,
                'tanggal_transaksi'=>now(),
                'tanggal_slip'=>now(),
                'karyawan_id'=>$this->user->karyawan_id,
            ]
        );
        $this->curSimpanan->decrement('jumlah', $jumlahTarikan);
    }


    public function kasMasuk(int $kasMasuk)
    {
        $this->kasBMT->detail()->create([
            'kode' => 'kode1',
            'tanggal' => now(),
            'debit' => $kasMasuk,
            'kredit' => 0,
            'saldo_awal' => $this->kasBMT->jumlah,
            'saldo_akhir' => $this->kasBMT->jumlah + $kasMasuk,
            'keterangan' => 'OK',
            'karyawan_id' => $this->user->karyawan_id,
        ]);
        $this->kasUtama->detail()->create([
            'kode' => 'kode1',
            'tanggal' => now(),
            'debit' => 0,
            'kredit' => $kasMasuk,
            'saldo_awal' => $this->kasUtama->jumlah,
            'saldo_akhir' => $this->kasUtama->jumlah - $kasMasuk,
            'keterangan' => 'OK',
            'karyawan_id' => $this->user->karyawan_id,
        ]);
        $detailKasBMT = $this->kasBMT->detail()->latest()->first();
        $detailKasBMT->transaksi()->create(
            [
                'kode' => 'KAS00001',
                'nama' =>'Kas Masuk',
                'keterangan'=>'OK',
                'debit'=>$kasMasuk,
                'kredit'=>0,
                'tanggal_transaksi'=>now(),
                'tanggal_slip'=>now(),
                'karyawan_id'=>$this->user->karyawan_id,
            ]
        );

        $this->kasBMT->increment('jumlah', $kasMasuk);
        $this->kasUtama->decrement('jumlah', $kasMasuk);
    }

    public function kasKeluar(int $kasKeluar)
    {
        $this->kasBMT->detail()->create([
            'kode' => 'kode1',
            'tanggal' => now(),
            'debit' => 0,
            'kredit' => $kasKeluar,
            'saldo_awal' => $this->kasBMT->jumlah,
            'saldo_akhir' => $this->kasBMT->jumlah - $kasKeluar,
            'keterangan' => 'OK',
            'karyawan_id' => $this->user->karyawan_id,
        ]);
        $this->kasUtama->detail()->create([
            'kode' => 'kode1',
            'tanggal' => now(),
            'debit' => $kasKeluar,
            'kredit' => 0,
            'saldo_awal' => $this->kasUtama->jumlah,
            'saldo_akhir' => $this->kasUtama->jumlah + $kasKeluar,
            'keterangan' => 'OK',
            'karyawan_id' => $this->user->karyawan_id,
        ]);
        $detailKasBMT = $this->kasBMT->detail()->latest()->first();
        $detailKasBMT->transaksi()->create(
            [
                'kode' => 'KAS00001',
                'nama' =>'Kas Keluar',
                'keterangan'=>'OK',
                'debit'=>0,
                'kredit'=>$kasKeluar,
                'tanggal_transaksi'=>now(),
                'tanggal_slip'=>now(),
                'karyawan_id'=>$this->user->karyawan_id,
            ]
        );

        $this->kasBMT->decrement('jumlah', $kasKeluar);
        $this->kasUtama->increment('jumlah', $kasKeluar);
    }
}
