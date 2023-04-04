<?php

namespace App\Http\Controllers;

use App\Models\Pembiayaan;
use App\Http\Requests\StorePembiayaanRequest;
use App\Http\Requests\UpdatePembiayaanRequest;
use App\Services\BMTService;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class PembiayaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pembiayaans = Pembiayaan::all();
        return Inertia::render('BMT/Pembiayaan', compact('pembiayaans'));
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
     * @param  \App\Http\Requests\StorePembiayaanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePembiayaanRequest $request, BMTService $bmt)
    {
        //

        $bmt->createPembiayaan($request->validated());
        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembiayaan  $pembiayaan
     * @return \Illuminate\Http\Response
     */
    public function show(Pembiayaan $pembiayaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pembiayaan  $pembiayaan
     * @return \Illuminate\Http\Response
     */
    public function edit(Pembiayaan $pembiayaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePembiayaanRequest  $request
     * @param  \App\Models\Pembiayaan  $pembiayaan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePembiayaanRequest $request, Pembiayaan $pembiayaan)
    {
        //
        $pembiayaan->update($request->validated());
        $pembiayaan->save();
        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pembiayaan  $pembiayaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pembiayaan $pembiayaan)
    {
        //
        $pembiayaan->delete();
        return redirect(route('pembiayaan.index'));

    }
}
