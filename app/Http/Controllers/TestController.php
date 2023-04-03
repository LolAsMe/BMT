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
        dd('5');
    }
}
