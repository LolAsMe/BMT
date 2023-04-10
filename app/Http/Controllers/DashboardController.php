<?php

namespace App\Http\Controllers;

use App\Models\Kas;
use App\Models\Simpanan;
use App\Models\Transaksi;
use App\Models\TransaksiHarian;
use Auth;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    //
    public function index()
    {
        if (Auth::user()->hasJabatan('funding')) {
            $group = Auth::user()->karyawan->group;
            $group->load('anggota:id,nama');
            return Inertia::render('DashboardKaryawan', compact('group'));
        } else if (Auth::user()->hasJabatan('Manajer') || Auth::user()->hasJabatan('Teller')) {
            $kasBMT = Kas::find(2);
            $kasBrankas = Kas::find(1);
            $tanggal = now();

            $transaksis = Transaksi::whereDate('tanggal_transaksi', $tanggal)->with(['log'])->get()->loadMorph('log', [
                DetailSimpanan::class => ['simpanan.anggota'],
                DetailPembiayaan::class => ['pembiayaan.anggota'],
            ]);
            $attribute = [];
            $attribute['jumlahDebit'] =  $transaksis->sum('debit');
            $attribute['jumlahKredit'] =  $transaksis->sum('kredit');
            $attribute['saldoAwal'] =  $kasBMT->detail()->whereDate('tanggal', now())->first()->saldo_awal;
            $attribute['selisih'] =  $transaksis->sum('debit') - $transaksis->sum('kredit');
            return Inertia::render('Dashboard', [
                'kasBMT' => $kasBMT,
                'kasBrankas' => $kasBrankas,
                'transaksis' => $transaksis,
                'attribute' => $attribute,
            ]);
        };
    }
}
