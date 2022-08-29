<?php

namespace App\Http\Controllers;

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
        //
        // $bmt->setCurrentSimpanan(Simpanan::find(2));
        $bmt->kasKeluar(15000000);
        $transaksi = Transaksi::latest()->with('log')->take(1)->get();
        return Inertia::render('BMT/Test', compact('transaksi'));
    }
}
