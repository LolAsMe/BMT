<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Kas;
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
        $kas = Kas::find(2);
        $brankas = Kas::find(1);
        $angsuran = Pembiayaan::latest()->first();
        return Inertia::render('BMT/Setor/Index', compact('angsuran','kas','brankas'));
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
