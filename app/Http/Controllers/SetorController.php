<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Pembiayaan;
use App\Models\Simpanan;
use App\Services\BMTService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SetorController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $angsuran = Pembiayaan::latest()->first();
        return Inertia::render('BMT/Setor/Index', compact('angsuran'));
    }

    public function batch()
    {
        //
        $groups = Group::all();
        return Inertia::render('BMT/Setor/SetorBatch', compact('groups'));
    }

    public function setor(Request $request, Simpanan $simpanan, BMTService $bmt)
    {
        $bmt->setCurrentSimpanan($simpanan)->setor($request->jumlah);
        return redirect()->back();
    }
}
