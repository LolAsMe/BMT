<?php

namespace App\Http\Controllers;

use App\Models\Pembiayaan;
use App\Models\Simpanan;
use App\Models\Transaksi;
use App\Services\BMTService;
use DB;
use Illuminate\Http\Request;
use Inertia\Inertia;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BMTService $bmt)
    {
        // $bmt->tambahPembiayaan();
        $bmt->setCurrentPembiayaan(Pembiayaan::find(11));
        $bmt->angsur(4);
        $transaksi = Transaksi::latest()->with('log')->take(1)->get();
        return Inertia::render('BMT/Test', compact('transaksi'));
    }
}
