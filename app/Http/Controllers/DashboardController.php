<?php

namespace App\Http\Controllers;

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
            $transaksiHarian = TransaksiHarian::whereDate('tanggal',now()->format('Y-m-d'))->get();

            return Inertia::render('Dashboard',compact('transaksiHarian'));
        };
    }
}
