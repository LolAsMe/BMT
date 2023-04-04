<?php

namespace App\Services;

use App\Models\Anggota;
use App\Models\DetailPembiayaan;
use App\Models\Kas;
use App\Models\Pembiayaan;
use App\Models\Simpanan;

class BMTService
{
    private string $default_password;
    private Simpanan $currentSimpanan;
    private Pembiayaan $currentPembiayaan;
    private ?DetailPembiayaan $lastDetailPembiayaan;
    private $kasBrankas;
    private $kasBMT;
    private $user;

    private $angsuranKe = null;


    public function __construct($default_password = '123456')
    {
        $this->default_password = $default_password;
        // $this->currentSimpanan = Simpanan::find(1);
        $this->user = auth('web')->user();
        $this->kasBrankas = Kas::find(1);
        $this->kasBMT = Kas::find(2);
    }

    public function createPembiayaan($attribute)
    {
        Pembiayaan::create($attribute);
        $this->kasKeluar($attribute['pokok']);
    }

    public function SetorBrankas(int $jumlah)
    {
        $this->kasKeluar($jumlah);
        $this->kasMasuk($jumlah, 2);
    }

    public function TarikBrankas(int $jumlah)
    {
        $this->kasMasuk($jumlah);
        $this->kasKeluar($jumlah, 2);
    }

    public function searchAnggota(?array $parameter = [])
    {
        $anggotas = Anggota::searchAnggota($parameter);
        $anggotas->whereDoesntHave('group');
        return $anggotas->with('simpanan')->take(20)->get();
    }

    public function setCurrentSimpanan(Simpanan $simpanan)
    {
        $this->currentSimpanan = $simpanan;
        return $this;
    }
    public function setor(int $jumlahSetoran)
    {
        $this->currentSimpanan->detail()->create([
            'kode' => 'kode1',
            'tanggal_transaksi' => now(),
            'tanggal_slip' => now(),
            'debit' => 0,
            'kredit' => $jumlahSetoran,
            'saldo_awal' => $this->currentSimpanan->jumlah,
            'saldo_akhir' => $this->currentSimpanan->jumlah + $jumlahSetoran,
            'keterangan' => 'OK',
            'karyawan_id' => $this->user->karyawan_id,

        ]);
        $detail = $this->currentSimpanan->detail()->latest()->first();
        $detail->transaksi()->create(
            [
                'kode' => 'kode1',
                'nama' => 'SET Mudhorobah',
                'keterangan' => 'OK',
                'debit' => $jumlahSetoran,
                'kredit' => 0,
                'tanggal_transaksi' => now(),
                'tanggal_slip' => now(),
                'karyawan_id' => $this->user->karyawan_id,
            ]
        );
        $this->currentSimpanan->increment('jumlah', $jumlahSetoran);
        $this->kasMasuk($jumlahSetoran);
    }

    public function tarik(int $jumlahTarikan)
    {
        $this->currentSimpanan->detail()->create([
            'kode' => 'kode1',
            'tanggal_transaksi' => now(),
            'tanggal_slip' => now(),
            'debit' => $jumlahTarikan,
            'kredit' => 0,
            'saldo_awal' => $this->currentSimpanan->jumlah,
            'saldo_akhir' => $this->currentSimpanan->jumlah - $jumlahTarikan,
            'keterangan' => 'OK',
            'karyawan_id' => $this->user->karyawan_id,

        ]);
        $detail = $this->currentSimpanan->detail()->latest()->first();
        $detail->transaksi()->create(
            [
                'kode' => 'kode1',
                'nama' => 'SET Mudhorobah',
                'keterangan' => 'OK',
                'debit' => 0,
                'kredit' => $jumlahTarikan,
                'tanggal_transaksi' => now(),
                'tanggal_slip' => now(),
                'karyawan_id' => $this->user->karyawan_id,
            ]
        );
        $this->currentSimpanan->decrement('jumlah', $jumlahTarikan);
        $this->kasKeluar($jumlahTarikan);
    }


    // option 1 untuk kas BMt
    // option 2 untuk brankas
    public function kasMasuk(int $kasMasuk, $option = 1, $keterangan = "ok")
    {
        if ($option == 1) {
            $kas = $this->kasBMT;
        } else if ($option == 2) {
            $kas = $this->kasBrankas;
        }
        $kas->detail()->create([
            'kode' => 'kode1',
            'tanggal' => now(),
            'debit' => $kasMasuk,
            'kredit' => 0,
            'saldo_awal' => $kas->jumlah,
            'saldo_akhir' => $kas->jumlah + $kasMasuk,
            'keterangan' => $keterangan,
            'karyawan_id' => $this->user->karyawan_id,
        ]);

        $detailKasBMT = $kas->detail()->latest()->first();
        $detailKasBMT->transaksi()->create(
            [
                'kode' => 'KAS00001',
                'nama' => 'Kas Masuk',
                'keterangan' => 'OK',
                'debit' => $kasMasuk,
                'kredit' => 0,
                'tanggal_transaksi' => now(),
                'tanggal_slip' => now(),
                'karyawan_id' => $this->user->karyawan_id,
            ]
        );

        $kas->increment('jumlah', $kasMasuk);
    }

    // option 1 untuk kas BMt
    // option 2 untuk brankas
    public function kasKeluar(int $kasKeluar, $option = 1, $keterangan = "ok")
    {
        if ($option == 1) {
            $kas = $this->kasBMT;
        } else if ($option == 2) {
            $kas = $this->kasBrankas;
        }
        $kas->detail()->create([
            'kode' => 'kode1',
            'tanggal' => now(),
            'debit' => 0,
            'kredit' => $kasKeluar,
            'saldo_awal' => $kas->jumlah,
            'saldo_akhir' => $kas->jumlah - $kasKeluar,
            'keterangan' => $keterangan,
            'karyawan_id' => $this->user->karyawan_id,
        ]);
        $detailKasBMT = $kas->detail()->latest()->first();
        $detailKasBMT->transaksi()->create(
            [
                'kode' => 'KAS00001',
                'nama' => 'Kas Keluar',
                'keterangan' => 'OK',
                'debit' => 0,
                'kredit' => $kasKeluar,
                'tanggal_transaksi' => now(),
                'tanggal_slip' => now(),
                'karyawan_id' => $this->user->karyawan_id,
            ]
        );

        $kas->decrement('jumlah', $kasKeluar);
    }


    public function setCurrentPembiayaan(Pembiayaan $pembiayaan)
    {
        $this->currentPembiayaan = $pembiayaan;
        $this->lastDetailPembiayaan = $this->currentPembiayaan->detail()->latest()->first();
        return $this;
    }

    public function tambahPembiayaan()
    {
        Pembiayaan::create([
            'kode' => 'Pembiayaan',
            'nomor' => 'NoPemb02',
            'jenis_pembiayaan_id' => '1',
            'simpanan_id' => '1',
            'karyawan_id' => '8',
            'tanggal_pinjam' => now(),
            'jumlah' => 100000000,
            'tanggal_jatuh_tempo' => now(),
            'pokok' => 1000000,
            'jasa' => 200000,
            'potongan_pembiayaan' => 0,
            'total_pembiayaan' => 12000000,
            'frekuensi_angsuran' => 4,
            'jumlah_angsuran' => 3000000,
            'angsuran_diterima' => 0,
            'keterangan' => '',
            'status' => 'ongoing'

        ]);
    }

    public function angsur(int $angsuranKe)
    {
        $this->angsuranKe = $angsuranKe;
        if ($this->isAngsuranOngoing()) {
            $this->attempToAngsur();
        } else {
            //angsuran sudah selesai atau masih pending
        }
    }

    public function isAngsuranOngoing()
    {
        return $this->currentPembiayaan->status == 'ongoing' || $this->currentPembiayaan->status == 'ongoing-telat';
    }
    public function handleFirstAngsuran()
    {
        debugbar()->addMessage('handle first Angsuran');
        $this->currentPembiayaan->detail()->create([
            'angsuran_ke' => 1,
            'jumlah' => $this->currentPembiayaan->jumlah_angsuran,
            'akumulasi_angsuran' => $this->currentPembiayaan->jumlah_angsuran,
            'total_tanggungan' => $this->currentPembiayaan->total_pembiayaan - $this->currentPembiayaan->jumlah_angsuran,
            'keterangan' => 'Ok',
        ]);
        $this->currentPembiayaan->angsuran_diterima = $this->currentPembiayaan->jumlah_angsuran;
        $this->lastDetailPembiayaan = $this->currentPembiayaan->detail()->latest()->first();
        $this->lastDetailPembiayaan->transaksi()->create(
            [
                'kode' => 'PEMB 012930',
                'nama' => 'PEM Mudhorobah',
                'keterangan' => 'OK',
                'debit' => $this->currentPembiayaan->jumlah_angsuran,
                'kredit' => 0,
                'tanggal_transaksi' => now(),
                'tanggal_slip' => now(),
                'karyawan_id' => $this->user->karyawan_id,
            ]
        );
        $this->kasMasuk($this->currentPembiayaan->jumlah_angsuran);
    }

    public function handleAngsuran()
    {
        debugbar()->addMessage('handle Angsuran');
        $detail = $this->currentPembiayaan->detail()->create([
            'angsuran_ke' => $this->angsuranKe,
            'jumlah' => $this->currentPembiayaan->jumlah_angsuran,
            'akumulasi_angsuran' => $this->lastDetailPembiayaan->akumulasi_angsuran + $this->currentPembiayaan->jumlah_angsuran,
            'total_tanggungan' => $this->lastDetailPembiayaan->total_tanggungan - $this->currentPembiayaan->jumlah_angsuran,
            'keterangan' => 'Ok',
        ]);
        $this->lastDetailPembiayaan = $this->currentPembiayaan->detail()->latest()->first();
        $this->lastDetailPembiayaan->transaksi()->create(
            [
                'kode' => 'PEMB 012930',
                'nama' => 'PEM Mudhorobah',
                'keterangan' => 'OK',
                'debit' => $this->currentPembiayaan->jumlah_angsuran,
                'kredit' => 0,
                'tanggal_transaksi' => now(),
                'tanggal_slip' => now(),
                'karyawan_id' => $this->user->karyawan_id,
            ]
        );
        $this->currentPembiayaan->angsuran_diterima = $this->currentPembiayaan->angsuran_diterima + $this->currentPembiayaan->jumlah_angsuran;
        $this->kasMasuk($this->currentPembiayaan->jumlah_angsuran);
    }

    public function isFirstAngsuran()
    {
        return $this->lastDetailPembiayaan === null;
    }
    public function isValidAngsuran()
    {
        debugbar()->addMessage('Check Angsuran Yg Valid');
        $this->angsuranKe = $this->lastDetailPembiayaan === null ? 1 : $this->lastDetailPembiayaan->angsuran_ke + 1;
        return $this->angsuranKe <= $this->currentPembiayaan->frekuensi_angsuran;
    }
    public function checkStatusAngsuran()
    {

        if ($this->currentPembiayaan->angsuran_diterima == $this->currentPembiayaan->total_pembiayaan && $this->lastDetailPembiayaan->total_tanggungan == 0 && $this->lastDetailPembiayaan->angsuran_ke == $this->currentPembiayaan->frekuensi_angsuran) {
            $this->currentPembiayaan->status = 'selesai';
        }
    }

    public function isAngsuranSelesai()
    {
        return $this->currentPembiayaan->status == 'selesai' && $this->lastDetailPembiayaan->total_tanggungan != 0;
    }
    public function attempToAngsur()
    {

        debugbar()->addMessage('isFirstAngsuran ?' . $this->isFirstAngsuran());

        $this->isValidAngsuran() ?  ($this->isFirstAngsuran()
            ? $this->handleFirstAngsuran()
            : $this->handleAngsuran()) : null;

        $this->checkStatusAngsuran();
        $this->currentPembiayaan->save();

        // if ($lastDetail === null) {
        //     $this->currentPembiayaan->detail()->create([
        //         'angsuran_ke' => 1,
        //         'jumlah' => $this->currentPembiayaan->jumlah_angsuran,
        //         'akumulasi_angsuran' => $this->currentPembiayaan->jumlah_angsuran,
        //         'total_tanggungan' => $this->currentPembiayaan->total_pembiayaan - $this->currentPembiayaan->jumlah_angsuran,
        //         'keterangan' => 'Ok',
        //     ]);
        //     $this->currentPembiayaan->angsuran_diterima = $this->currentPembiayaan->jumlah_angsuran;
        // } else {
        //     if ($lastDetail->angsuran_ke < $this->currentPembiayaan->frekuensi_angsuran + 1 && $lastDetail->angsuran_ke + 1 == $angsuranKe) {
        //         $this->currentPembiayaan->detail()->create([
        //             'angsuran_ke' => $lastDetail->angsuran_ke + 1,
        //             'jumlah' => $this->currentPembiayaan->jumlah_angsuran,
        //             'akumulasi_angsuran' => $lastDetail->akumulasi_angsuran + $this->currentPembiayaan->jumlah_angsuran,
        //             'total_tanggungan' => $lastDetail->total_tanggungan - $this->currentPembiayaan->jumlah_angsuran,
        //             'keterangan' => 'Ok',
        //         ]);
        //         $this->currentPembiayaan->angsuran_diterima = $this->currentPembiayaan->angsuran_diterima + $this->currentPembiayaan->jumlah_angsuran;
        //     }

        //     if ($this->currentPembiayaan->frekuensi_angsuran == $angsuranKe && $lastDetail->angsuran_ke < $this->currentPembiayaan->frekuensi_angsuran + 1) {
        //         $this->currentPembiayaan->detail()->create([
        //             'angsuran_ke' => $lastDetail->angsuran_ke + 1,
        //             'jumlah' => $this->currentPembiayaan->jumlah_angsuran,
        //             'akumulasi_angsuran' => $lastDetail->akumulasi_angsuran + $this->currentPembiayaan->jumlah_angsuran,
        //             'total_tanggungan' => $lastDetail->total_tanggungan - $this->currentPembiayaan->jumlah_angsuran,
        //             'keterangan' => 'Ok',
        //         ]);
        //         $this->currentPembiayaan->angsuran_diterima = $this->currentPembiayaan->angsuran_diterima + $this->currentPembiayaan->jumlah_angsuran;
        //         $this->currentPembiayaan->status = "selesai";
        //     }
        // }
        // $this->currentPembiayaan->save();
        // $statusDetail = $lastDetail === null;
        // if ( $statusDetail || $lastDetail->angsuran_ke < $this->currentPembiayaan->frekuensi_angsuran && $angsuranKe > 0 && $angsuranKe == $lastDetail->angsuran_ke + 1) {
        //     $this->currentPembiayaan->detail()->create([
        //         'angsuran_ke' =>         $statusDetail ? 1 : $lastDetail->angsuran_ke + 1,
        //         'jumlah' => $this->currentPembiayaan->jumlah_angsuran,
        //         'akumulasi_angsuran' => $statusDetail ? $this->currentPembiayaan->jumlah_angsuran : $lastDetail->akumulasi_angsuran + $this->currentPembiayaan->jumlah_angsuran,
        //         'total_tanggungan' => $statusDetail ? $this->currentPembiayaan->total_pembiayaan - $this->currentPembiayaan->jumlah_angsuran : $lastDetail->total_tanggungan - $this->currentPembiayaan->jumlah_angsuran,
        //         'keterangan' => 'Ok',
        //     ]);
        //     $this->currentPembiayaan->angsuran_diterima = $this->currentPembiayaan->angsuran_diterima + $this->currentPembiayaan->jumlah_angsuran;
        //     if ($angsuranKe == $lastDetail->angsuran_ke + 1) {
        //         $this->currentPembiayaan->status = 'selesai';
        //     }
        // $this->currentPembiayaan->save();
        // }
    }

    public function kasTambah($jumlah, $keterangan)
    {
        if ($jumlah < 0) {
            $this->kasKeluar(-$jumlah, 1, $keterangan);
        } else {
            $this->kasMasuk($jumlah, 1, $keterangan);
        }
    }
}
