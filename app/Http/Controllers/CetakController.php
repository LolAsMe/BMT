<?php

namespace App\Http\Controllers;

use App\Models\Cetak;
use App\Http\Requests\StoreCetakRequest;
use App\Http\Requests\UpdateCetakRequest;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class CetakController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cetaks = Cetak::all();
        return Inertia::render('BMT/Cetak', compact('cetaks'));
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
     * @param  \App\Http\Requests\StoreCetakRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCetakRequest $request)
    {
        //
        // dd($request->validated());
        Cetak::create($request->validated());

        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cetak  $cetak
     * @return \Illuminate\Http\Response
     */
    public function show(Cetak $cetak)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cetak  $cetak
     * @return \Illuminate\Http\Response
     */
    public function edit(Cetak $cetak)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCetakRequest  $request
     * @param  \App\Models\Cetak  $cetak
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCetakRequest $request, Cetak $cetak)
    {
        //
        $cetak->update($request->validated());
        $cetak->save();
        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cetak  $cetak
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cetak $cetak)
    {
        //
        $cetak->delete();
        return redirect(route('cetak.index'));

    }
}
