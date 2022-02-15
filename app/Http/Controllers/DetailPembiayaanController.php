<?php

namespace App\Http\Controllers;

use App\Models\DetailPembiayaan;
use App\Http\Requests\StoreDetailPembiayaanRequest;
use App\Http\Requests\UpdateDetailPembiayaanRequest;
use App\Models\Pembiayaan;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class DetailPembiayaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Pembiayaan $pembiayaan)
    {
        //
        $pembiayaan = $pembiayaan->load('detail');
        // dd($pembiayaan);
        return Inertia::render('BMT/DetailPembiayaan', compact('pembiayaan'));
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
    public function store(StoreDetailPembiayaanRequest $request,Pembiayaan $pembiayaan)
    {
        //
        // dd($request->validated());
        $detail = $pembiayaan->detail()->create($request->validated());

        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailPembiayaan  $detail
     * @return \Illuminate\Http\Response
     */
    public function show(DetailPembiayaan $detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailPembiayaan  $detail
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailPembiayaan $detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDetailPembiayaanRequest  $request
     * @param  \App\Models\DetailPembiayaan  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetailPembiayaanRequest $request, DetailPembiayaan $detail)
    {
        //
        $detail->update($request->validated());
        $detail->save();
        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailPembiayaan  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailPembiayaan $detail)
    {
        //
        // dd('test');
        $detail->delete();
        return back()->with('flash', [
            'response' => 'berhasil'
        ]);

    }
}
