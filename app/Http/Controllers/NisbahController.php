<?php

namespace App\Http\Controllers;

use App\Models\Nisbah;
use App\Http\Requests\StoreNisbahRequest;
use App\Http\Requests\UpdateNisbahRequest;
use App\Models\DetailNisbah;
use App\Models\Laba;
use App\Models\Simpanan;
use App\Services\BMTService;
use App\Services\KodeGeneratorService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class NisbahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BMTService $bmt)
    {
        //
        $paginate = Nisbah::with('simpanan', 'simpanan.anggota')->orderBy('status', 'asc')->paginate();
        // $simpanans= Simpanan::whereJenisSimpananId(11)->get()->toArray();
        //simpanan mudhorobah 664
        // $simpanan->tambahInvestasi();

        //hitung nisbah


        //tambah setor mudhorobah
        // $simpanan = Simpanan::find(664);



        // debugbar()->addMessage($simpanans);
        return Inertia::render('BMT/Nisbah', compact('paginate'));
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
    public function store(Request $request, KodeGeneratorService $kodeGeneratorService)
    {
        //
        $attribute = $request->all();
        $attribute['kode'] = $kodeGeneratorService->generateKodeNisbah();
        Nisbah::create($attribute);

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
        $nisbah->load('detail', 'simpanan.anggota');
        return Inertia::render('BMT/Nisbah/ShowOneNisbah', compact('nisbah'));
    }
    public function hitungView(Request $request)
    {
        //

        if($request['tanggal']){
            $bulan = $request['tanggal'];
            $bulan = Carbon::createFromFormat('Y-m-d', $bulan)->format('m-Y');

            // dd(now($bulan));
        }else {
            $detail = DetailNisbah::orderBy('id', 'desc')->first();
            $bulan = $detail->bulan;
        }

        $details = DetailNisbah::select('pengendapan', 'saldo_rata_rata', 'hasil', 'nisbah_id')->with('nisbah.simpanan.anggota')->whereBulan($bulan)->get();
        // DetailNisbah::
        //bulan
        //laba
        //nisbah total
        $nisbah['bulan'] = $bulan;
        $nisbah['laba'] = Laba::whereBulan($bulan)->first()?Laba::whereBulan($bulan)->first()->jumlah:0;
        $nisbah['total'] = $details->sum('nisbah.awal');
        return Inertia::render('BMT/Nisbah/Hitung', compact('details', 'nisbah'));
    }

    public function hitungNisbah(Request $request,BMTService $bmt)
    {
        $bmt->hitungNisbah();
        return back();
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

    public function active(Nisbah $nisbah)
    {
        $nisbah->restore();
        return back();
    }
    public function search(Request $request)
    {
        $nisbahs = Nisbah::orderBy('id');
        $request->nama ? $nisbahs->whereHas(
            'simpanan.anggota',
            function ($query) use ($request) {
                return $query->where('nama', 'like', '%' . $request->nama . '%');
            }
        ) : null;
        $request->kodeSimpanan ? $nisbahs->whereHas(
            'simpanan',
            function ($query) use ($request) {
                return $query->where('kode', 'like', '%' . $request->kodeSimpanan . '%');
            }
        ) : null;
        $request->kode ? $nisbahs->where('kode', 'like', '%' . $request->kode . '%')  : null;
        $request->kodeAnggota ? $nisbahs->whereHas(
            'simpanan.anggota',
            function ($query) use ($request) {
                return $query->where('kode', 'like', '%' . $request->kodeAnggota . '%');
            }
        ) : null;
        $paginate = $nisbahs->with('simpanan.anggota')->take(25)->paginate();
        $paginate->appends([
            'nama' => $request->nama,
            'alamat' => $request->kodeSimpanan,
            'kodeAnggota' => $request->kodeAnggota,
            'kode' => $request->kode,
        ]);
        return Inertia::render('BMT/Nisbah', compact('paginate'));
    }
}
