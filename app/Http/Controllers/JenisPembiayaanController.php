<?php

namespace App\Http\Controllers;

use App\Models\JenisPembiayaan;
use App\Http\Requests\StoreJenisPembiayaanRequest;
use App\Http\Requests\UpdateJenisPembiayaanRequest;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class JenisPembiayaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jenisPembiayaans = JenisPembiayaan::all();
        return Inertia::render('BMT/JenisPembiayaan', compact('jenisPembiayaans'));
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
     * @param  \App\Http\Requests\StoreJenisPembiayaanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJenisPembiayaanRequest $request)
    {
        //
        // dd($request->validated());
        JenisPembiayaan::create($request->validated());

        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisPembiayaan  $jenisPembiayaan
     * @return \Illuminate\Http\Response
     */
    public function show(JenisPembiayaan $jenisPembiayaan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisPembiayaan  $jenisPembiayaan
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisPembiayaan $jenisPembiayaan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJenisPembiayaanRequest  $request
     * @param  \App\Models\JenisPembiayaan  $jenisPembiayaan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJenisPembiayaanRequest $request, JenisPembiayaan $jenisPembiayaan)
    {
        //
        $jenisPembiayaan->update($request->validated());
        $jenisPembiayaan->save();
        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisPembiayaan  $jenisPembiayaan
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisPembiayaan $jenisPembiayaan)
    {
        //
        $jenisPembiayaan->delete();
        return redirect(route('jenisPembiayaan.index'));

    }
}
