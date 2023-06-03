<?php

namespace App\Services;

use App\Models\Anggota;
use App\Models\DetailNisbah;
use App\Models\DetailPembiayaan;
use App\Models\Kas;
use App\Models\Laba;
use App\Models\Nisbah;
use App\Models\Pembiayaan;
use App\Models\Simpanan;
use App\Models\TransaksiHarian;
use Carbon\Carbon;

class BMTService
{
    private string $default_password;
    private Simpanan $currentSimpanan;
    private Pembiayaan $currentPembiayaan;
    private TransaksiHarian $transaksiHarian;
    private ?DetailPembiayaan $lastDetailPembiayaan;
    private $nisbahRate;
    private $kasBrankas;
    private $kasBMT;
    private $user;
    private KodeGeneratorService $kodeGeneratorService;

    private $angsuranKe = null;


    public function __construct($default_password = '123456',$kodeGeneratorService)
    {
        $this->default_password = $default_password;
        $this->kodeGeneratorService = $kodeGeneratorService;
        // $this->currentSimpanan = Simpanan::find(1);
        $this->user = auth('web')->user();
        $this->kasBrankas = Kas::find(1);
        $this->kasBMT = Kas::find(2);
        $this->transaksiHarian = TransaksiHarian::whereDate('tanggal', now())->first() ?? new TransaksiHarian();
        $this->nisbahRate = 0.5;
    }

    public function createPembiayaan($attribute)
    {
        $kas = $this->kasBMT;
        $attribute['karyawan_id'] = $this->user->karyawan_id;
        $attribute['angsuran_diterima'] = $this->user->karyawan_id;
        $attribute['status'] = 'ongoing';
        $pembiayaan = Pembiayaan::create($attribute);
        $pembiayaan->detail()->create([
            'angsuran_ke' => 0,
            'jumlah' => $pembiayaan->jumlah_angsuran,
            'akumulasi_angsuran' => 0,
            'total_tanggungan' => $pembiayaan->total_pembiayaan,
            'keterangan' => 'Pembiayaan Baru',
        ]);
        $pembiayaan->angsuran_diterima = $pembiayaan->jumlah_angsuran;
        $this->lastDetailPembiayaan = $pembiayaan->detail()->latest()->first();
        $this->lastDetailPembiayaan->transaksi()->create(
            [
                'kode' => $this->kodeGeneratorService->generateKodeTransaksi('pembiayaan'),
                'nama' => $this->kodeGeneratorService->generateKodePembiayaan($attribute['jenis_pembiayaan_id']),
                'keterangan' => 'OK',
                'debit' => 0,
                'kredit' => $pembiayaan->jumlah,
                'tanggal_transaksi' => now(),
                'tanggal_slip' => now(),
                'karyawan_id' => $this->user->karyawan_id,
            ]
        );

        $this->transaksiHarian->increment('kredit', $pembiayaan->jumlah);

        $kas->detail()->create([
            'kode' => $this->kodeGeneratorService->generateDetailKas('02','02'),
            'tanggal' => now(),
            'debit' => 0,
            'kredit' => $attribute['jumlah'],
            'saldo_awal' => $kas->jumlah,
            'saldo_akhir' => $kas->jumlah - $attribute['jumlah'],
            'keterangan' => $attribute['keterangan'],
            'karyawan_id' => $this->user->karyawan_id,
        ]);
        $kas->decrement('jumlah', $attribute['jumlah']);
    }

    public function setorBrankas(int $jumlah)
    {
        $this->kasKeluar($jumlah, 1, 'Setor Ke Brankas', 1);
        $this->kasMasuk($jumlah, 2);
    }

    public function tarikBrankas(int $jumlah)
    {
        $this->kasMasuk($jumlah, 1, 'Tarik Dari Brankas', 1);
        $this->kasKeluar($jumlah, 2);
    }

    public function searchAnggota(?array $parameter = [])
    {
        $anggotas = Anggota::searchAnggota($parameter);
        $anggotas->whereDoesntHave('group');
        return $anggotas->with('simpanan')->take(5)->paginate(8);
    }

    public function setCurrentSimpanan(Simpanan $simpanan)
    {
        $this->currentSimpanan = $simpanan;
        return $this;
    }
    public function setor(int $jumlahSetoran)
    {
        $kode = $this->currentSimpanan->kode;
        $kode = substr($kode,(strrpos($kode, '.',2)+1));
        $kode = $this->kodeGeneratorService->generateKodeDetailSimpanan('setoran',$kode);

        $this->currentSimpanan->detail()->create([
            'kode' => $kode,
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
                'kode' => $this->kodeGeneratorService->generateKodeTransaksi('setoran'),
                'nama' => $kode,
                'keterangan' => 'OK',
                'debit' => $jumlahSetoran,
                'kredit' => 0,
                'tanggal_transaksi' => now(),
                'tanggal_slip' => now(),
                'karyawan_id' => $this->user->karyawan_id,
            ]
        );
        $this->currentSimpanan->increment('jumlah', $jumlahSetoran);
        $this->transaksiHarian->increment('debit', $jumlahSetoran);
        $this->kasMasuk($jumlahSetoran);
    }

    public function tarik(int $jumlahTarikan)
    {
        $kode = $this->currentSimpanan->kode;
        $kode = substr($kode,(strrpos($kode, '.',2)+1));
        $kode = $this->kodeGeneratorService->generateKodeDetailSimpanan('penarikan',$kode);
        $this->currentSimpanan->detail()->create([
            'kode' => $kode,
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
                'kode' => $this->kodeGeneratorService->generateKodeTransaksi('penarikan'),
                'nama' => $kode,
                'keterangan' => 'OK',
                'debit' => 0,
                'kredit' => $jumlahTarikan,
                'tanggal_transaksi' => now(),
                'tanggal_slip' => now(),
                'karyawan_id' => $this->user->karyawan_id,
            ]
        );
        $this->currentSimpanan->decrement('jumlah', $jumlahTarikan);
        $this->transaksiHarian->increment('kredit', $jumlahTarikan);

        $this->kasKeluar($jumlahTarikan);

    }


    // option 1 untuk kas BMt
    // option 2 untuk brankas
    // pilih 1 di with transaksi untuk memasukan ke transaksi, bila masuk transaksi otomatis masuk laba
    public function kasMasuk(int $kasMasuk, $option = 1, $keterangan = "ok", $withTransaksi = 0)
    {
        if ($option == 1) {
            $kas = $this->kasBMT;
            $kasID = '02';
        } else if ($option == 2) {
            $kas = $this->kasBrankas;
            $kasID = '01';
        }else{
            abort(404);
        }
        $kode = $this->kodeGeneratorService->generateDetailKas($kasID,'01');
        $kas->detail()->create([
            'kode' => $kode,
            'tanggal' => now(),
            'debit' => $kasMasuk,
            'kredit' => 0,
            'saldo_awal' => $kas->jumlah,
            'saldo_akhir' => $kas->jumlah + $kasMasuk,
            'keterangan' => $keterangan,
            'karyawan_id' => $this->user->karyawan_id,
        ]);

        if ($withTransaksi == 1) {
            $detailKasBMT = $kas->detail()->latest()->first();
            $detailKasBMT->transaksi()->create(
                [
                    'kode' => $this->kodeGeneratorService->generateKodeTransaksi('kas'),
                    'nama' => $kode,
                    'keterangan' => $keterangan,
                    'debit' => $kasMasuk,
                    'kredit' => 0,
                    'tanggal_transaksi' => now(),
                    'tanggal_slip' => now(),
                    'karyawan_id' => $this->user->karyawan_id,
                ]
            );
            $this->transaksiHarian->increment('debit', $kasMasuk);

            $attribute = ['kode' => "Kas006", 'keterangan' => $keterangan];
            // $this->labaMasuk($kasMasuk, $attribute);
        }

        $kas->increment('jumlah', $kasMasuk);
    }

    // option 1 untuk kas BMt
    // option 2 untuk brankas
    // pilih 1 di with transaksi untuk memasukan ke transaksi
    public function kasKeluar(int $kasKeluar, $option = 1, $keterangan = "ok", $withTransaksi = 0)
    {
        if ($option == 1) {
            $kas = $this->kasBMT;
            $kasID = '02';
        } else if ($option == 2) {
            $kasID = '01';
            $kas = $this->kasBrankas;
        }
        $kode = $this->kodeGeneratorService->generateDetailKas($kasID,'02');
        $kas->detail()->create([
            'kode' => $kode,
            'tanggal' => now(),
            'debit' => 0,
            'kredit' => $kasKeluar,
            'saldo_awal' => $kas->jumlah,
            'saldo_akhir' => $kas->jumlah - $kasKeluar,
            'keterangan' => $keterangan,
            'karyawan_id' => $this->user->karyawan_id,
        ]);
        $detailKasBMT = $kas->detail()->latest()->first();
        if ($withTransaksi == 1) {

            $detailKasBMT->transaksi()->create(
                [
                    'kode' => $this->kodeGeneratorService->generateKodeTransaksi('kas'),
                    'nama' => $kode,
                    'keterangan' => $keterangan,
                    'debit' => 0,
                    'kredit' => $kasKeluar,
                    'tanggal_transaksi' => now(),
                    'tanggal_slip' => now(),
                    'karyawan_id' => $this->user->karyawan_id,
                ]
            );
            $this->transaksiHarian->increment('kredit', $kasKeluar);
            $attribute = ['kode' => "Kas006", 'keterangan' => $keterangan];
            // $this->labaKeluar($kasKeluar, $attribute);
        }

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
            'kode' => $this->kodeGeneratorService->generateKodePembiayaan(1),
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

        $kode = $this->currentPembiayaan->kode;
        $kode = substr($kode,(strrpos($kode, '.',2)+1));
        $kode = $this->kodeGeneratorService->generateKodeDetailPembiayaan($kode,1);

        $this->lastDetailPembiayaan->transaksi()->create(
            [
                'kode' => $this->kodeGeneratorService->generateKodeTransaksi('angsuran'),
                'nama' => $kode,
                'keterangan' => 'OK',
                'debit' => $this->currentPembiayaan->jumlah_angsuran,
                'kredit' => 0,
                'tanggal_transaksi' => now(),
                'tanggal_slip' => now(),
                'karyawan_id' => $this->user->karyawan_id,
            ]
        );

        $this->transaksiHarian->increment('debit', $this->currentPembiayaan->jumlah_angsuran);
        $this->kasMasuk($this->currentPembiayaan->jumlah_angsuran);
        $attribute = [
            'kode' => 'Setor',
            'keterangan' => 'ok'
        ];
        $total = $this->currentPembiayaan->total_pembiayaan;
        $jumlah = $this->currentPembiayaan->jumlah;
        $frekuensi = $this->currentPembiayaan->frekuensi_angsuran;
        $laba = ($total - $jumlah) / $frekuensi;
        $this->labaMasuk($laba, $attribute);
    }

    public function handleAngsuran()
    {
        debugbar()->addMessage('handle Angsuran');
        if ($this->angsuranKe == $this->currentPembiayaan->frekuensi_angsuran) {
            $jumlahAngsuran = $this->currentPembiayaan->jumlah_angsuran = $this->lastDetailPembiayaan->total_tanggungan;
        } else {
            $jumlahAngsuran = $this->currentPembiayaan->jumlah_angsuran;
        }
        $detail = $this->currentPembiayaan->detail()->create([
            'angsuran_ke' => $this->angsuranKe,
            'jumlah' => $this->currentPembiayaan->jumlah_angsuran,
            'akumulasi_angsuran' => $this->lastDetailPembiayaan->akumulasi_angsuran + $jumlahAngsuran,
            'total_tanggungan' => $this->lastDetailPembiayaan->total_tanggungan - $jumlahAngsuran,
            'keterangan' => 'Ok',
        ]);
        $this->lastDetailPembiayaan = $this->currentPembiayaan->detail()->latest()->first();
        $this->currentPembiayaan->angsuran_diterima += $jumlahAngsuran;

        $kode = $this->currentPembiayaan->kode;
        $kode = substr($kode,(strrpos($kode, '.',2)+1));
        $kode = $this->kodeGeneratorService->generateKodeDetailPembiayaan($kode,$this->angsuranKe);

        $this->lastDetailPembiayaan->transaksi()->create(
            [
                'kode' => $this->kodeGeneratorService->generateKodeTransaksi('angsuran'),
                'nama' => $kode,
                'keterangan' => 'OK',
                'debit' => $jumlahAngsuran,
                'kredit' => 0,
                'tanggal_transaksi' => now(),
                'tanggal_slip' => now(),
                'karyawan_id' => $this->user->karyawan_id,
            ]
        );
        $this->transaksiHarian->increment('debit', $jumlahAngsuran);
        $attribute = [
            'kode' => 'Setor',
            'keterangan' => 'ok'
        ];
        $total = $this->currentPembiayaan->total_pembiayaan;
        $jumlah = $this->currentPembiayaan->jumlah;
        $frekuensi = $this->currentPembiayaan->frekuensi_angsuran;
        $laba = ($total - $jumlah) / $frekuensi;
        $this->labaMasuk($laba, $attribute);
        $this->kasMasuk($jumlahAngsuran);
        $this->currentPembiayaan->save();
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
        // dd(
        //     $this->lastDetailPembiayaan->total_tanggungan == 0 && $this->lastDetailPembiayaan->angsuran_ke == $this->currentPembiayaan->frekuensi_angsuran
        // );
        $this->checkStatusPembiayaan();
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
    }

    public function kasTambah($jumlah, $keterangan)
    {
        if ($jumlah < 0) {
            $this->kasKeluar(-$jumlah, 1, $keterangan, 1);
        } else {
            $this->kasMasuk($jumlah, 1, $keterangan, 1);
        }
    }

    public function hitungNisbah()
    {
        $laba = Laba::labaThisMonth()->jumlah;
        $bulan = now()->format('m-Y');
        $lastDetail = DetailNisbah::whereStatus("selesai")->latest()->first();
        if ($lastDetail && $lastDetail->bulan == $bulan) {
            // dd("bulan ini Sudah");
        }
        $nisbahs = Nisbah::whereStatus('ongoing')->get();
        foreach ($nisbahs as $key => $nisbah) {
            $tanggal_awal = Carbon::createFromDate($nisbah->tanggal_awal);
            $tanggal_selesai = Carbon::createFromDate($nisbah->tanggal_selesai);

            //check valid tanggal
            // dd(now()->gte($tanggal_awal) && now()->lte($tanggal_selesai));
            if (now()->gte($tanggal_awal) && now()->lte($tanggal_selesai)) {
                if ($tanggal_awal->format('m') == now()->format('m')) {
                    $hariSatuBulan = now()->daysInMonth;
                    $hari = (int)$tanggal_awal->format('d');
                    $pengendapan = $hariSatuBulan - $hari;

                    $saldoRataRata = $pengendapan * $nisbah->awal / $hariSatuBulan;
                } else if ($tanggal_selesai->format('m') == now()->format('m')) {
                    $hariSatuBulan = now()->daysInMonth;
                    $pengendapan = $tanggal_selesai->format('d');
                    $saldoRataRata = $pengendapan * $nisbah->awal / $hariSatuBulan;
                    $nisbah->status = "selesai";
                } else {
                    $hariSatuBulan = now()->daysInMonth;
                    $pengendapan = $hariSatuBulan;
                    $saldoRataRata = $nisbah->awal;
                }
                $hasil = 0;
                $detail = $nisbah->detail()->create([
                    'pengendapan' => $pengendapan,
                    'bulan' => $bulan,
                    'saldo_rata_rata' => $saldoRataRata,
                    'hasil' => $hasil
                ]);
            }
        }
        $nisbahs->load(['detail' => function ($query) {
            return $query->whereStatus('ongoing');
        }]);
        $totalSaldo = 0;
        foreach ($nisbahs as $key => $nisbah) {
            $totalSaldo += $nisbah->detail[0]->saldo_rata_rata;
        }

        foreach ($nisbahs as $key => $nisbah) {
            $hasil = $nisbah->detail[0]->saldo_rata_rata * $this->nisbahRate * $laba / $totalSaldo;
            $nisbah->detail[0]->hasil = $hasil;
            $nisbah->detail[0]->status = "selesai";
            $nisbah->detail[0]->save();
            $nisbah->jumlah += $hasil;
            $nisbah->save();
        }

        // dd('selesai');
    }

    public function labaMasuk($jumlah, $attribute = [])
    {
        $laba = Laba::labaThisMonth();
        $laba->detail()->create([
            'kode' => $attribute['kode'] ?? "Laba",
            'debit' => $jumlah,
            'saldo_awal' => $laba->jumlah,
            'saldo_akhir' => $laba->jumlah + $jumlah,
            'keterangan' => $attribute['keterangan'] ?? "Ok"
        ]);
        $laba->jumlah += $jumlah;
        $laba->save();
    }
    public function labaKeluar($jumlah, $attribute = [])
    {
        $laba = Laba::labaThisMonth();
        $laba->detail()->create([
            'kode' => $attribute['kode'] ?? "Laba",
            'kredit' => $jumlah,
            'saldo_awal' => $laba->jumlah,
            'saldo_akhir' => $laba->jumlah - $jumlah,
            'keterangan' => $attribute['keterangan'] ?? "Ok"
        ]);
        $laba->jumlah -= $jumlah;
        $laba->save();
    }

    public static function startTheDay()
    {
        $harian = TransaksiHarian::create(['kode' => "000", "debit" => 0, "kredit" => 0]);
        $kasBMT = Kas::find(2);
        $kasBMT->detail()->create([
            'kode' => (new KodeGeneratorService)->generateDetailKas('02','00'),
            'tanggal' => now(),
            'debit' => 0,
            'kredit' => 0,
            'saldo_awal' => $kasBMT->jumlah,
            'saldo_akhir' => $kasBMT->jumlah,
            'keterangan' => 'Saldo Awal',
        ]);
    }

    public function checkStatusPembiayaan()
    {
        $pembiayaan = $this->currentPembiayaan;
        if($pembiayaan->total_pembiayaan < $pembiayaan->angsuran_diterima){
            $pembiayaan->status = 'selesai';
            $pembiayaan->save();
        }
    }
}
