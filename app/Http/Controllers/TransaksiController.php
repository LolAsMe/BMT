<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Http\Requests\StoreTransaksiRequest;
use App\Http\Requests\UpdateTransaksiRequest;
use App\Models\Kas;
use App\Models\Pembiayaan;
use App\Models\Simpanan;
use App\Models\TransaksiHarian;
use Illuminate\Http\Request;
use App\Services\BMTService;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // dd("transaksis");
        $kasBMT = Kas::find(2);
        $kasBrankas = Kas::find(1);
        $transaksis = Transaksi::whereDate('tanggal_transaksi',now())->get();
        $attribute = [];
        $attribute['jumlahDebit']=  $transaksis->sum('debit');
        $attribute['jumlahKredit']=  $transaksis->sum('kredit');
        $attribute['saldoAwal']=  $kasBMT->detail()->whereDate('tanggal',now())->first()->saldo_awal;
        $attribute['selisih']=  $transaksis->sum('debit') - $transaksis->sum('kredit');
        // dd($transaksis);
        return Inertia::render('BMT/Transaksi', compact('kasBMT','kasBrankas','transaksis' ,'attribute'));
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
        $bmt->setCurrentSimpanan($simpanan)->tarik($request->jumlah);
        return redirect()->back();

    }

    public function angsur(Request $request, Pembiayaan $pembiayaan, BMTService $bmt)
    {
        $bmt->setCurrentPembiayaan($pembiayaan)->attempToAngsur();
        return redirect()->back();

    }

    public function setorBrankas(Request $request , BMTService $bmt)
    {
        $bmt->setorBrankas($request->jumlah);
        return redirect()->back();

    }

    public function tarikBrankas(Request $request , BMTService $bmt)
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
}
