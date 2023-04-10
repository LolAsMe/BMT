<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use App\Models\DetailPembiayaan;
use App\Models\DetailSimpanan;
use App\Models\Kas;
use App\Models\Pembiayaan;
use App\Models\Simpanan;
use App\Models\TransaksiHarian;
use Illuminate\Http\Request;
use App\Services\BMTService;
use DebugBar\DebugBar;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        // dd("transaksis");
        $kasBMT = Kas::find(2);
        $kasBrankas = Kas::find(1);
        $tanggal = $request->tanggal ?? now();

        $transaksis = Transaksi::whereDate('tanggal_transaksi', $tanggal)->with(['log'])->get()->loadMorph('log', [
            DetailSimpanan::class => ['simpanan.anggota'],
            DetailPembiayaan::class => ['pembiayaan.anggota'],
        ]);


        $attribute = [];
        $attribute['jumlahDebit'] =  $transaksis->sum('debit');
        $attribute['jumlahKredit'] =  $transaksis->sum('kredit');
        $attribute['saldoAwal'] =  $kasBMT->detail()->whereDate('tanggal', now())->first()->saldo_awal;
        $attribute['selisih'] =  $transaksis->sum('debit') - $transaksis->sum('kredit');
        return Inertia::render('BMT/Transaksi', [
            'kasBMT' => $kasBMT,
            'kasBrankas' => $kasBrankas,
            'transaksis' => $transaksis,
            'attribute' => $attribute,
            'simpanans' => function () use ($request) {
                $simpanans = Simpanan::orderBy('id', 'desc');
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
                $request->kode ? $simpanans->where('kode', 'like', '%' . $request->kode . '%')  : null;
                $simpanans->with(['anggota', 'jenisSimpanan']);
                $simpanans = $simpanans->take(4)->get();
                $simpanans->map(function ($simpanan) {
                    $simpanan->load(['detail' => function ($query) {
                        $query->orderBy('id', 'desc')->take(8);
                    }]);
                    return $simpanan;
                });
                DebugBar()->addMessage($request->all());
                DebugBar()->addMessage($simpanans);
                return $simpanans;
            }, 'pembiayaans' => function () use ($request) {
                $pembiayaans = Pembiayaan::orderBy('id', 'desc');
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
                $pembiayaans->with(['anggota', 'jenisPembiayaan']);
                $pembiayaans = $pembiayaans->take(4)->get();
                $pembiayaans->map(function ($pembiayaan) {
                    $pembiayaan->load(['detail' => function ($query) {
                        $query->orderBy('id', 'desc')->take(8);
                    }]);
                    return $pembiayaan;
                });
                DebugBar()->addMessage($request->all());
                DebugBar()->addMessage($pembiayaans);
                return $pembiayaans;
            }
        ]);
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
     * @param  \App\Http\Requests\StoreTransaksiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTransaksiRequest $request)
    {
        //
        // dd($request->validated());
        Transaksi::create($request->validated());

        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaksi $transaksi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransaksiRequest  $request
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransaksiRequest $request, Transaksi $transaksi)
    {
        //
        $transaksi->update($request->validated());
        $transaksi->save();
        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaksi  $transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaksi $transaksi)
    {
        //
        $transaksi->delete();
        return redirect(route('transaksi.index'));
    }

    public function tarik(Request $request, Simpanan $simpanan, BMTService $bmt)
    {
        $bmt->setCurrentSimpanan($simpanan)->tarik($request->jumlah, $request->keterangan);
        return redirect()->back();
    }
    public function angsur(Request $request, Pembiayaan $pembiayaan, BMTService $bmt)
    {
debugbar()->addMessage($pembiayaan);
        $bmt->setCurrentPembiayaan($pembiayaan)->attempToAngsur();
        return redirect()->back();
    }

    public function setorBrankas(Request $request, BMTService $bmt)
    {
        $bmt->setorBrankas($request->jumlah);
        return redirect()->back();
    }

    public function tarikBrankas(Request $request, BMTService $bmt)
    {
        $bmt->tarikBrankas($request->jumlah);
        return redirect()->back();
    }

    public function makeHarian(BMTService $bmt)
    {
        BMTService::startTheDay();
        return redirect()->back();
    }

    public function tambahKas(Request $request, BMTService $bmt)
    {
        $bmt->kasTambah($request->jumlah, $request->keterangan);
        return redirect()->back();
    }


    public function pemasukan(Request $request, BMTService $bmt)
    {
        $bmt->kasTambah($request->pemasukan, $request->keterangan);
        return redirect()->back();
    }
    public function pengeluaran(Request $request, BMTService $bmt)
    {
        $bmt->kasTambah(-$request->pengeluaran, $request->keterangan);
        return redirect()->back();
    }

    public function setor(Request $request, Simpanan $simpanan, BMTService $bmt)
    {
        $bmt->setCurrentSimpanan($simpanan)->setor($request->jumlah, $request->keterangan);
        return redirect()->back();
    }
}
