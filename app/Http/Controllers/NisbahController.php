<?php

namespace App\Http\Controllers;

use App\Models\Nisbah;
use App\Http\Requests\StoreNisbahRequest;
use App\Http\Requests\UpdateNisbahRequest;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class NisbahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $nisbahs = Nisbah::all();
        return Inertia::render('BMT/Nisbah', compact('nisbahs'));
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
     * @param  \App\Http\Requests\StoreNisbahRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNisbahRequest $request)
    {
        //
        // dd($request->validated());
        Nisbah::create($request->validated());

        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Nisbah  $nisbah
     * @return \Illuminate\Http\Response
     */
    public function show(Nisbah $nisbah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Nisbah  $nisbah
     * @return \Illuminate\Http\Response
     */
    public function edit(Nisbah $nisbah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNisbahRequest  $request
     * @param  \App\Models\Nisbah  $nisbah
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNisbahRequest $request, Nisbah $nisbah)
    {
        //
        $nisbah->update($request->validated());
        $nisbah->save();
        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Nisbah  $nisbah
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nisbah $nisbah)
    {
        //
        $nisbah->delete();
        return redirect(route('nisbah.index'));

    }
}
