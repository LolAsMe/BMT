<?php

namespace App\Http\Controllers;

use App\Models\Simpanan;
use App\Http\Requests\StoreSimpananRequest;
use App\Http\Requests\UpdateSimpananRequest;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class SimpananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $simpanans = Simpanan::all();
        return Inertia::render('BMT/Simpanan', compact('simpanans'));
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
     * @param  \App\Http\Requests\StoreSimpananRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSimpananRequest $request)
    {
        //
        // dd($request->validated());
        Simpanan::create($request->validated());

        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function show(Simpanan $simpanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Simpanan $simpanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSimpananRequest  $request
     * @param  \App\Models\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSimpananRequest $request, Simpanan $simpanan)
    {
        //
        $simpanan->update($request->validated());
        $simpanan->save();
        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Simpanan $simpanan)
    {
        //
        $simpanan->delete();
        return redirect(route('simpanan.index'));

    }
}
