<?php

namespace App\Http\Controllers;

use App\Models\DetailSimpanan;
use App\Http\Requests\StoreDetailSimpananRequest;
use App\Http\Requests\UpdateDetailSimpananRequest;
use App\Models\Simpanan;
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
        $details = DetailSimpanan::all();
        return Inertia::render('BMT/DetailSimpanan', compact('details'));
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
    public function store(StoreDetailSimpananRequest $request,Simpanan $simpanan)
    {
        //
        // dd($request->validated());
        $detail = $simpanan->detail()->create($request->validated());

        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailSimpanan  $detail
     * @return \Illuminate\Http\Response
     */
    public function show(DetailSimpanan $detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailSimpanan  $detail
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailSimpanan $detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDetailSimpananRequest  $request
     * @param  \App\Models\DetailSimpanan  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetailSimpananRequest $request, DetailSimpanan $detail)
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
     * @param  \App\Models\DetailSimpanan  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailSimpanan $detail)
    {
        //
        // dd('test');
        $detail->delete();
        return redirect(route('simpanan.detail.index'));

    }
}
