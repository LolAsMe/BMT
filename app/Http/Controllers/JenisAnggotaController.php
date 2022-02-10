<?php

namespace App\Http\Controllers;

use App\Models\JenisAnggota;
use App\Http\Requests\StoreJenisAnggotaRequest;
use App\Http\Requests\UpdateJenisAnggotaRequest;

class JenisAnggotaController extends Controller
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
     * @param  \App\Http\Requests\StoreJenisAnggotaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJenisAnggotaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisAnggota  $jenisAnggota
     * @return \Illuminate\Http\Response
     */
    public function show(JenisAnggota $jenisAnggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisAnggota  $jenisAnggota
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisAnggota $jenisAnggota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJenisAnggotaRequest  $request
     * @param  \App\Models\JenisAnggota  $jenisAnggota
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJenisAnggotaRequest $request, JenisAnggota $jenisAnggota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisAnggota  $jenisAnggota
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisAnggota $jenisAnggota)
    {
        //
    }
}
