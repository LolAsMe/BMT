<?php

namespace App\Http\Controllers;

use App\Models\Pembiayaan;
use App\Http\Requests\StorePembiayaanRequest;
use App\Http\Requests\UpdatePembiayaanRequest;

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
    public function store(StorePembiayaanRequest $request)
    {
        //
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
    }
}
