<?php

namespace App\Http\Controllers;

use App\Models\DetailNisbah;
use App\Http\Requests\StoreDetailNisbahRequest;
use App\Http\Requests\UpdateDetailNisbahRequest;
use App\Models\Nisbah;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class DetailNisbahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $detailNisbahs = DetailNisbah::all();
        return Inertia::render('BMT/DetailNisbah', compact('detailNisbahs'));
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
     * @param  \App\Http\Requests\StoreDetailNisbahRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDetailNisbahRequest $request,Nisbah $nisbah)
    {
        //
        // dd($request->validated());
        $nisbah->detail()->create($request->validated());

        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailNisbah  $detailNisbah
     * @return \Illuminate\Http\Response
     */
    public function show(DetailNisbah $detailNisbah)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailNisbah  $detailNisbah
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailNisbah $detailNisbah)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDetailNisbahRequest  $request
     * @param  \App\Models\DetailNisbah  $detailNisbah
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDetailNisbahRequest $request, DetailNisbah $detail)
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
     * @param  \App\Models\DetailNisbah  $detailNisbah
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailNisbah $detail)
    {
        //
        // dd('test');
        $detail->delete();
        return redirect(route('detailNisbah.index'));

    }
}
