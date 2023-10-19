<?php

namespace App\Http\Controllers;

use App\Models\Pembiayaan;
use App\Models\Transaksi;
use App\Services\BMTService;
use Auth;
use DB;
use Illuminate\Support\Collection;
use Inertia\Inertia;

class DashboardController extends Controller
{
    //
    public function index(BMTService $bmt)
    {

        if (Auth::user()->hasJabatan('funding')) {

            // $saldoAwal = $bmt->saldoAwal;
            $groups = $bmt->getGroupAnggota(Auth::user());
            return Inertia::render('DashboardKaryawan', [
                'groups' => $groups,
            ]);
        } else if (Auth::user()->hasJabatan('Manajer') || Auth::user()->hasJabatan('Teller')) {
            $saldoAwal = $bmt->saldoAwal;
            $attribute = $bmt->getAttributeDashboard();

            return Inertia::render('Dashboard', [
                'attribute' => $attribute,
            ]);
        };
    }

    public function tambahView()
    {
        return Inertia::render('BMT/tambah', []);
    }
}
