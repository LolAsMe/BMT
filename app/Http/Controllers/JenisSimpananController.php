<?php

namespace App\Http\Controllers;

use App\Models\JenisSimpanan;
use App\Http\Requests\StoreJenisSimpananRequest;
use App\Http\Requests\UpdateJenisSimpananRequest;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class JenisSimpananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $jenisSimpanans = JenisSimpanan::all();
        return Inertia::render('BMT/JenisSimpanan', compact('jenisSimpanans'));
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
     * @param  \App\Http\Requests\StoreJenisSimpananRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreJenisSimpananRequest $request)
    {
        //
        // dd($request->validated());
        JenisSimpanan::create($request->validated());

        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\JenisSimpanan  $jenisSimpanan
     * @return \Illuminate\Http\Response
     */
    public function show(JenisSimpanan $jenisSimpanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\JenisSimpanan  $jenisSimpanan
     * @return \Illuminate\Http\Response
     */
    public function edit(JenisSimpanan $jenisSimpanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateJenisSimpananRequest  $request
     * @param  \App\Models\JenisSimpanan  $jenisSimpanan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateJenisSimpananRequest $request, JenisSimpanan $jenisSimpanan)
    {
        //
        $jenisSimpanan->update($request->validated());
        $jenisSimpanan->save();
        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\JenisSimpanan  $jenisSimpanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(JenisSimpanan $jenisSimpanan)
    {
        //
        $jenisSimpanan->delete();
        return redirect(route('jenisSimpanan.index'));

    }
}
