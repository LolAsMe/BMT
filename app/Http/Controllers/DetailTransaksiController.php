<?php

namespace App\Http\Controllers;

use App\Models\DetailTransaksi;
use App\Http\Requests\StoreDetailTransaksiRequest;
use App\Http\Requests\UpdateDetailTransaksiRequest;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class DetailTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $detailTransaksis = DetailTransaksi::all();
        return Inertia::render('BMT/DetailTransaksi', compact('detailTransaksis'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDetailTransaksiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDetailTransaksiRequest $request)
    {
        //
        // dd($request->validated());
        DetailTransaksi::create($request->validated());

        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailTransaksi  $detailTransaksi
     * @return \Illuminate\Http\Response
     */
    public function show(DetailTransaksi $detailTransaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailTransaksi  $detailTransaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailTransaksi $detailTransaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDetailTransaksiRequest  $request
     * @param  \App\Models\DetailTransaksi  $detailTransaksi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetailTransaksiRequest $request, DetailTransaksi $detailTransaksi)
    {
        //
        $detailTransaksi->update($request->validated());
        $detailTransaksi->save();
        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailTransaksi  $detailTransaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailTransaksi $detailTransaksi)
    {
        //
        $detailTransaksi->delete();
        return redirect(route('detailTransaksi.index'));

    }
}
