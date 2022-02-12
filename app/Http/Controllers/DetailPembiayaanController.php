<?php

namespace App\Http\Controllers;

use App\Models\DetailPembiayaan;
use App\Http\Requests\StoreDetailPembiayaanRequest;
use App\Http\Requests\UpdateDetailPembiayaanRequest;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class DetailPembiayaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $detailPembiayaans = DetailPembiayaan::all();
        return Inertia::render('BMT/DetailPembiayaan', compact('detailPembiayaans'));
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
     * @param  \App\Http\Requests\StoreDetailPembiayaanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDetailPembiayaanRequest $request)
    {
        //
        // dd($request->validated());
        DetailPembiayaan::create($request->validated());

        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailPembiayaan  $detailPembiayaan
     * @return \Illuminate\Http\Response
     */
    public function show(DetailPembiayaan $detailPembiayaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailPembiayaan  $detailPembiayaan
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailPembiayaan $detailPembiayaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDetailPembiayaanRequest  $request
     * @param  \App\Models\DetailPembiayaan  $detailPembiayaan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetailPembiayaanRequest $request, DetailPembiayaan $detailPembiayaan)
    {
        //
        $detailPembiayaan->update($request->validated());
        $detailPembiayaan->save();
        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailPembiayaan  $detailPembiayaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailPembiayaan $detailPembiayaan)
    {
        //
        $detailPembiayaan->delete();
        return redirect(route('detailPembiayaan.index'));

    }
}
