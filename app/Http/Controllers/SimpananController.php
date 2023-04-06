<?php

namespace App\Http\Controllers;

use App\Models\Simpanan;
use App\Http\Requests\StoreSimpananRequest;
use App\Http\Requests\UpdateSimpananRequest;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SimpananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $simpanans = Simpanan::take(25)->orderByDesc('id')->get();
        $simpanans->load('anggota', 'jenisSimpanan');
        debugbar()->addMessage($simpanans->toArray());
        return Inertia::render('BMT/Simpanan', compact('simpanans'));
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
     * @param  \App\Http\Requests\StoreSimpananRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSimpananRequest $request)
    {
        //
        // dd($request->validated());
        Simpanan::create($request->validated());

        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Simpanan $simpanan)
    {
        $simpanan->load(['anggota', 'jenisSimpanan','detail'=>function($query){
            return $query->take(20)->latest()->orderBy('id','desc');
        }]);
        debugbar()->addMessage($simpanan);
        //
        return Inertia::render('BMT/Simpanan/ShowOneSimpanan', compact('simpanan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function edit(Simpanan $simpanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSimpananRequest  $request
     * @param  \App\Models\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSimpananRequest $request, Simpanan $simpanan)
    {
        //
        dd($request->all());
        $simpanan->load('anggota');
        $request->jenis_simpanan_id ? $simpanan->jenis_simpanan_id = $request->jenis_simpanan_id : null;
        $request->nama_anggota ? $simpanan->anggota->nama = $request->nama_anggota : null;
        $request->nomer_ktp ? $simpanan->anggota->no_ktp =  $request->nomer_ktp : null;
        $request->jenis_kelamin ? $simpanan->anggota->jenis_kelamin = $request->jenis_kelamin : null;
        $request->alamat ? $simpanan->anggota->alamat = $request->alamat : null;
        $request->telepon ? $simpanan->anggota->telepon = $request->telepon : null;
        $request->pekerjaan ? $simpanan->anggota->pekerjaan = $request->pekerjaan : null;
        $request->tempat_lahir ? $simpanan->anggota->tempat_lahir = $request->tempat_lahir : null;
        $request->tanggal_lahir ? $simpanan->anggota->tanggal_lahir = $request->tanggal_lahir : null;
        $request->keterangan ? $simpanan->keterangan = $request->keterangan : null;
        $request->nama_ibu_kandung ? $simpanan->anggota->nama_ibu_kandung = $request->nama_ibu_kandung : null;
        // $simpanan->update($request->validated());
        $simpanan->save();
        $simpanan->anggota->save();
        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Simpanan  $simpanan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Simpanan $simpanan)
    {
        //
        $simpanan->delete();
        return redirect(route('simpanan.index'));
    }

    public function search(Request $request)
    {
        $simpanans = Simpanan::orderBy('id');
        $request->nama ? $simpanans->whereHas(
            'anggota',
            function (Builder $query) use ($request) {
                return $query->where('nama', 'like', '%' . $request->nama . '%');
            }
        ) : null;
        $request->alamat ? $simpanans->whereHas(
            'anggota',
            function (Builder $query) use ($request) {
                return $query->where('alamat', 'like', '%' . $request->alamat . '%');
            }
        ) : null;
        $request->kode ? $simpanans->where('kode', 'like', '%' . $request->kode. '%')  : null;
        $request->kode_anggota ? $simpanans->whereHas(
            'anggota',
            function (Builder $query) use ($request) {
                return $query->where('kode', 'like', '%' . $request->kode . '%');
            }
        ) : null;
        $simpanans = $simpanans->with('anggota', 'jenisSimpanan')->take(25)->get();
        return Inertia::render('BMT/Simpanan', compact('simpanans'));
    }
}
