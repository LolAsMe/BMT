<?php

namespace App\Http\Controllers;

use App\Models\DetailSimpanan;
use App\Http\Requests\StoreDetailSimpananRequest;
use App\Http\Requests\UpdateDetailSimpananRequest;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class DetailSimpananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $detailSimpanans = DetailSimpanan::all();
        return Inertia::render('BMT/DetailSimpanan', compact('detailSimpanans'));
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
     * @param  \App\Http\Requests\StoreDetailSimpananRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDetailSimpananRequest $request)
    {
        //
        // dd($request->validated());
        DetailSimpanan::create($request->validated());

        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailSimpanan  $detailSimpanan
     * @return \Illuminate\Http\Response
     */
    public function show(DetailSimpanan $detailSimpanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailSimpanan  $detailSimpanan
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailSimpanan $detailSimpanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDetailSimpananRequest  $request
     * @param  \App\Models\DetailSimpanan  $detailSimpanan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetailSimpananRequest $request, DetailSimpanan $detailSimpanan)
    {
        //
        $detailSimpanan->update($request->validated());
        $detailSimpanan->save();
        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailSimpanan  $detailSimpanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailSimpanan $detailSimpanan)
    {
        //
        $detailSimpanan->delete();
        return redirect(route('detailSimpanan.index'));

    }
}
