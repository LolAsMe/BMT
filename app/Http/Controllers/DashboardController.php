<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use App\Models\Pembiayaan;
use App\Models\Simpanan;
use App\Models\Transaksi;
use App\Models\TransaksiHarian;
use App\Services\BMTService;
use Auth;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Inertia\Inertia;
use Storage;

class DashboardController extends Controller
{
    //
    public function index(BMTService $bmt)
    {
        if (Auth::user()->hasJabatan('funding')) {
            $kasBMT = $bmt->kasBMT;
            $kasBrankas = $bmt->kasBrankas;
            $tanggal = now();
            $kas = $kasBMT->detail()->whereDate('tanggal', now())->first();
            if ($kas) {
                $saldoAwal = $kas->saldo_awal;
            } else {
                BMTService::startTheDay();
                $saldoAwal = $kasBMT->detail()->whereDate('tanggal', now())->first()->saldo_awal;
            }
            $groups = Auth::user()->karyawan->group;
            $groups->load(['anggota','anggota.simpanan', 'anggota.pembiayaan']);
            // $simpanan = $groups->anggota;
            $groups->each(function ($group, $key) {
                $group->simpanan = new Collection;
                $group->pembiayaan = new Collection;
                foreach ($group->anggota as $key => $anggota) {
                    if ($anggota->simpanan) {
                        $group->simpanan->push($anggota->simpanan);
                    }
                    if ($anggota->pembiayaan) {
                        $group->pembiayaan->push($anggota->pembiayaan);
                    }
                    $group->anggota->makeHidden(['pembiayaan','simpanan']);

                }
            });
            return Inertia::render('DashboardKaryawan', [
                'groups' => $groups,
            ]);
        } else if (Auth::user()->hasJabatan('Manajer') || Auth::user()->hasJabatan('Teller')) {
            $kasBMT = $bmt->kasBMT;
            $kasBrankas = $bmt->kasBrankas;

            $tanggal = now();
            $kas = $kasBMT->detail()->whereDate('tanggal', now())->first();
            if ($kas) {
                $saldoAwal = $kas->saldo_awal;
            } else {
                BMTService::startTheDay();
                $saldoAwal = $kasBMT->detail()->whereDate('tanggal', now())->first()->saldo_awal;
            }

            $transaksis = Transaksi::whereDate('tanggal_transaksi', $tanggal)->with(['log'])->get()->loadMorph('log', [
                DetailSimpanan::class => ['simpanan.anggota'],
                DetailPembiayaan::class => ['pembiayaan.anggota'],
            ]);
            $attribute = [];
            $attribute['jumlahDebit'] =  $transaksis->sum('debit') ?? 0;
            $attribute['jumlahKredit'] =  $transaksis->sum('kredit') ?? 0;
            $attribute['saldoAwal'] =  $saldoAwal;
            $attribute['selisih'] =  $attribute['jumlahDebit'] - $attribute['jumlahKredit'];

            $sum = DB::select("
            SELECT    date(tanggal_transaksi) as date, SUM(debit) as debitTotal, SUM(kredit) as kreditTotal
            FROM      transaksi
            GROUP BY  date(tanggal_transaksi) order by date desc limit 7
            ");
            $attribute['sum'] = $sum;

            $pembiayaan = Pembiayaan::whereDate('tanggal_jatuh_tempo', "<", $tanggal)->with('anggota')->get();
            $attribute['pembiayaan_tertunggak'] = $pembiayaan;

            return Inertia::render('Dashboard', [
                'kasBMT' => $kasBMT,
                'kasBrankas' => $kasBrankas,
                'transaksis' => $transaksis,
                'attribute' => $attribute,
            ]);
        };
    }

    public function tambahView()
    {
        return Inertia::render('BMT/tambah', []);
    }
}
