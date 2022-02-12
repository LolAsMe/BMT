<?php

namespace App\Http\Controllers;

use App\Models\Anggunan;
use App\Http\Requests\StoreAnggunanRequest;
use App\Http\Requests\UpdateAnggunanRequest;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class AnggunanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $anggunans = Anggunan::all();
        return Inertia::render('BMT/Anggunan', compact('anggunans'));
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
     * @param  \App\Http\Requests\StoreAnggunanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnggunanRequest $request)
    {
        //
        // dd($request->validated());
        Anggunan::create($request->validated());

        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggunan  $anggunan
     * @return \Illuminate\Http\Response
     */
    public function show(Anggunan $anggunan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggunan  $anggunan
     * @return \Illuminate\Http\Response
     */
    public function edit(Anggunan $anggunan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnggunanRequest  $request
     * @param  \App\Models\Anggunan  $anggunan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnggunanRequest $request, Anggunan $anggunan)
    {
        //
        $anggunan->update($request->validated());
        $anggunan->save();
        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggunan  $anggunan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anggunan $anggunan)
    {
        //
        $anggunan->delete();
        return redirect(route('anggunan.index'));

    }
}
