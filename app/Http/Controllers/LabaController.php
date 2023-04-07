<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorelabaRequest;
use App\Http\Requests\UpdatelabaRequest;
use App\Models\Laba;
use Inertia\Inertia;

class LabaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $laba = Laba::labaThisMonth();
        $paginate = Laba::paginate();
        // dd($laba);
        debugbar()->addMessage($paginate->toArray());
        return Inertia::render('BMT/Laba/Index',compact('paginate'));

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
     * @param  \App\Http\Requests\StorelabaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorelabaRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\laba  $laba
     * @return \Illuminate\Http\Response
     */
    public function show(laba $laba)
    {
        //
        $laba->load('detail');
        return Inertia::render('BMT/Laba/ShowOneLaba',compact('laba'));


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\laba  $laba
     * @return \Illuminate\Http\Response
     */
    public function edit(laba $laba)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatelabaRequest  $request
     * @param  \App\Models\laba  $laba
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatelabaRequest $request, laba $laba)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\laba  $laba
     * @return \Illuminate\Http\Response
     */
    public function destroy(laba $laba)
    {
        //
    }
}
