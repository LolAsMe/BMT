<?php

namespace App\Http\Controllers;

use App\Models\Pembiayaan;
use App\Http\Requests\StorePembiayaanRequest;
use App\Http\Requests\UpdatePembiayaanRequest;
use App\Models\Anggota;
use App\Models\JenisPembiayaan;
use App\Services\BMTService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Inertia\Inertia;

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
        $pembiayaans = Pembiayaan::take(25)->orderByDesc('id')->get();
        $pembiayaans->load('anggota', 'jenisPembiayaan');
        $jenisPembiayaan = JenisPembiayaan::all('id', 'nama');
        debugbar()->addMessage($pembiayaans->toArray());
        debugbar()->addMessage($jenisPembiayaan->toArray());
        return Inertia::render('BMT/Pembiayaan/Index', compact('pembiayaans', 'jenisPembiayaan'));
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
    public function store(StorePembiayaanRequest $request, BMTService $bmt)
    {
        //
        // Pembiayaan::createPembiayaan($request->validated());
        $bmt->createPembiayaan($request->validated());

        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pembiayaan  $pembiayaan
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Pembiayaan $pembiayaan)
    {
        // dd($request->all!=null);
        debugbar()->addMessage($request->all());
        $pembiayaan->load([
            'anggota', 'jenisPembiayaan'
        ]);

        //filter tanggal, bulan, tahun,bulan_tahun
        $filter = $request->filter;
        $filterValue = $request->filterValue;
        $pembiayaan->load(['detail' => function ($query) {
            return $query->take(20)->orderBy('id', 'asc');
        }]);

        debugbar()->addMessage($pembiayaan);

        return Inertia::render('BMT/Pembiayaan/ShowOnePembiayaan', compact('pembiayaan'));
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
        dd($request->all());
        $pembiayaan->load('anggota');
        $request->jenis_pembiayaan_id ? $pembiayaan->jenis_pembiayaan_id = $request->jenis_pembiayaan_id : null;
        $request->nama_anggota ? $pembiayaan->anggota->nama = $request->nama_anggota : null;
        $request->nomer_ktp ? $pembiayaan->anggota->no_ktp =  $request->nomer_ktp : null;
        $request->jenis_kelamin ? $pembiayaan->anggota->jenis_kelamin = $request->jenis_kelamin : null;
        $request->alamat ? $pembiayaan->anggota->alamat = $request->alamat : null;
        $request->telepon ? $pembiayaan->anggota->telepon = $request->telepon : null;
        $request->pekerjaan ? $pembiayaan->anggota->pekerjaan = $request->pekerjaan : null;
        $request->tempat_lahir ? $pembiayaan->anggota->tempat_lahir = $request->tempat_lahir : null;
        $request->tanggal_lahir ? $pembiayaan->anggota->tanggal_lahir = $request->tanggal_lahir : null;
        $request->keterangan ? $pembiayaan->keterangan = $request->keterangan : null;
        $request->nama_ibu_kandung ? $pembiayaan->anggota->nama_ibu_kandung = $request->nama_ibu_kandung : null;
        // $pembiayaan->update($request->validated());
        $pembiayaan->save();
        $pembiayaan->anggota->save();
        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
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
        $pembiayaan->delete();
        return redirect(route('pembiayaan.index'));
    }

    public function search(Request $request)
    {
        $pembiayaans = Pembiayaan::orderBy('id');
        $request->nama ? $pembiayaans->whereHas(
            'anggota',
            function (Builder $query) use ($request) {
                return $query->where('nama', 'like', '%' . $request->nama . '%');
            }
        ) : null;
        $request->alamat ? $pembiayaans->whereHas(
            'anggota',
            function (Builder $query) use ($request) {
                return $query->where('alamat', 'like', '%' . $request->alamat . '%');
            }
        ) : null;
        $request->kode ? $pembiayaans->where('kode', 'like', '%' . $request->kode . '%')  : null;
        $request->kodeAnggota ? $pembiayaans->whereHas(
            'anggota',
            function (Builder $query) use ($request) {
                return $query->where('kode', 'like', '%' . $request->kodeAnggota . '%');
            }
        ) : null;
        $pembiayaans = $pembiayaans->with('anggota', 'jenisPembiayaan')->take(25)->get();
        return Inertia::render('BMT/Pembiayaan/Index', compact('pembiayaans'));
    }
}
