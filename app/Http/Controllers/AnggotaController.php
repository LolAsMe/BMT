<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Http\Requests\StoreAnggotaRequest;
use App\Http\Requests\UpdateAnggotaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $anggotas = Anggota::take(25)->get();
        $paginate = Anggota::take(25)->paginate()->onEachSide(3);
        // $paginate->onEachSide(3)->links();
        // dd(DB::table('anggota')->get());
        // dd($paginate->getUrlRange(1,5));

        return Inertia::render('BMT/Anggota', compact('anggotas', 'paginate'));
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
     * @param  \App\Http\Requests\StoreAnggotaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->validated());
        Anggota::create($request->all());

        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $anggota)
    {
        //
        $anggota->load('simpanan', 'pembiayaan');
        debugbar()->addMessage($anggota->toArray());

        return Inertia::render('BMT/Anggota/ShowOneAnggota', compact('anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit(Anggota $anggota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnggotaRequest  $request
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnggotaRequest $request, Anggota $anggota)
    {
        //
        $anggota->update($request->validated());
        $anggota->save();
        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,Anggota $anggota)
    {
        //
        $anggota->delete();
        return redirect(route('anggota.index'));
    }
    public function active(Anggota $anggota)
    {
        $anggota->restore();
        return back();
    }

    public function search(Request $request)
    {
        $anggotas = Anggota::orderBy('id');
        $request->nama ? $anggotas->where('nama', 'like', '%' . $request->nama . '%') : null;
        $request->alamat ? $anggotas->where('alamat', 'like', '%' . $request->alamat . '%') : null;
        $request->kodeAnggota ? $anggotas->where('kode', 'like', '%' . $request->kodeAnggota . '%') : null;
        $paginate = $anggotas->paginate();
        $paginate->appends([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kodeAnggota' => $request->kodeAnggota,
        ]);
        debugbar()->addMessage($anggotas);
        debugbar()->addMessage($request->nama);
        return Inertia::render('BMT/Anggota', compact('paginate'));
    }
}
