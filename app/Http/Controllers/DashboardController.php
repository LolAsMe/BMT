<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use App\Models\Simpanan;
use App\Models\Transaksi;
use App\Models\TransaksiHarian;
use App\Services\BMTService;
use Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    //
    public function index( BMTService $bmt)
    {
        if (Auth::user()->hasJabatan('funding')) {
            $kasBMT = Kas::find(2);
            $kasBrankas = Kas::find(1);
            $tanggal = now();
            $kas = $kasBMT->detail()->whereDate('tanggal', now())->first();
            if($kas){
                $saldoAwal = $kas->saldo_awal;
            }else{
                BMTService::startTheDay();
                $saldoAwal = $kasBMT->detail()->whereDate('tanggal', now())->first()->saldo_awal;
            }
            $group = Auth::user()->karyawan->group;
            $group->load('anggota:id,nama');
            return Inertia::render('DashboardKaryawan', compact('group'));
        } else if (Auth::user()->hasJabatan('Manajer') || Auth::user()->hasJabatan('Teller')) {
            $kasBMT = Kas::find(2);
            $kasBrankas = Kas::find(1);
            $tanggal = now();
            $kas = $kasBMT->detail()->whereDate('tanggal', now())->first();
            if($kas){
                $saldoAwal = $kas->saldo_awal;
            }else{
                BMTService::startTheDay();
                $saldoAwal = $kasBMT->detail()->whereDate('tanggal', now())->first()->saldo_awal;
            }

            $transaksis = Transaksi::whereDate('tanggal_transaksi', $tanggal)->with(['log'])->get()->loadMorph('log', [
                DetailSimpanan::class => ['simpanan.anggota'],
                DetailPembiayaan::class => ['pembiayaan.anggota'],
            ]);
            $attribute = [];
            $attribute['jumlahDebit'] =  $transaksis->sum('debit') ??0;
            $attribute['jumlahKredit'] =  $transaksis->sum('kredit')??0;
            $attribute['saldoAwal'] =  $saldoAwal;
            $attribute['selisih'] =  $attribute['jumlahDebit'] - $attribute['jumlahKredit'];
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
        return Inertia::render('BMT/tambah', [
        ]);
    }
}
