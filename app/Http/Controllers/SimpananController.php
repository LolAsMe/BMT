<?php

namespace App\Http\Controllers;

use App\Models\Simpanan;
use App\Http\Requests\StoreSimpananRequest;
use App\Http\Requests\UpdateSimpananRequest;
use App\Models\Anggota;
use App\Models\JenisSimpanan;
use App\Services\KodeGeneratorService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Inertia\Inertia;
use sirajcse\UniqueIdGenerator\UniqueIdGenerator;

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
        $paginate = Simpanan::take(25)->with('anggota', 'jenisSimpanan')->orderByDesc('id')->paginate();
        $anggotaTanpaSimpanan = Anggota::whereDoesntHave('simpanan')->get();
        $jenisSimpanan = JenisSimpanan::all('id', 'nama');
        return Inertia::render('BMT/Simpanan', compact('paginate', 'anggotaTanpaSimpanan', 'jenisSimpanan'));
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
    public function store(StoreSimpananRequest $request,KodeGeneratorService $kodeGeneratorService)
    {
        //
        $attribute = $request->validated();
        $attribute['kode']=$kodeGeneratorService->generateKodeSimpanan($attribute['jenis_simpanan_id']);
        Simpanan::create($attribute);

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
        // dd($request->all!=null);
        debugbar()->addMessage($request->all());
        $simpanan->load([
            'anggota', 'jenisSimpanan'
        ]);

        //filter tanggal, bulan, tahun,bulan_tahun
        $filter = $request->filter;
        $filterValue = $request->filterValue;
        if ($filter == 'tanggal') {
            $simpanan->load(['detail' => function ($query) use ($filterValue) {
                return $query->whereDate('tanggal_transaksi', $filterValue);
            }]);
        } else if ($filter == 'bulan') {
            $simpanan->load(['detail' => function ($query) use ($filterValue) {
                return $query->whereMonth('tanggal_transaksi', $filterValue);
            }]);
        } else if ($filter == 'tahun') {
            $simpanan->load(['detail' => function ($query) use ($filterValue) {
                return $query->whereYear('tanggal_transaksi', $filterValue);
            }]);
        } else if ($filter == 'bulan_tahun') {
            $simpanan->load(['detail' => function ($query) use ($filterValue) {
                $year = substr($filterValue, 0, 4);
                $month = substr($filterValue, 5);
                return $query->whereYear('tanggal_transaksi', $year)->whereMonth('tanggal_transaksi', $month);
            }]);
        } else {
            $simpanan->load(['detail' => function ($query) {
                return $query->take(20)->latest()->orderBy('id', 'desc');
            }]);
        }

        debugbar()->addMessage($simpanan);

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
        $simpanans = Simpanan::orderBy('id')->withTrashed();
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
        $request->jenis_id ? $simpanans->where('jenis_simpanan_id','=',$request->jenis_id,) : null;
        $request->kode ? $simpanans->where('kode', 'like', '%' . $request->kode . '%')  : null;
        $request->kodeAnggota ? $simpanans->whereHas(
            'anggota',
            function (Builder $query) use ($request) {
                return $query->where('kode', 'like', '%' . $request->kodeAnggota . '%');
            }
        ) : null;
        $anggotaTanpaSimpanan = Anggota::whereDoesntHave('simpanan')->get();
        $jenisSimpanan = JenisSimpanan::all('id', 'nama');
        $paginate = $simpanans->with('anggota', 'jenisSimpanan')->take(25)->paginate();
        $paginate->appends([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kodeAnggota' => $request->kodeAnggota,
            'kode' => $request->kode,
        ]);
        return Inertia::render('BMT/Simpanan', compact('paginate', 'anggotaTanpaSimpanan', 'jenisSimpanan'));
    }
    public function search3(Request $request)
    {
        $simpanans = Simpanan::orderBy('id');
        $simpanans->where('jenis_simpanan_id','=',04);
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
        $request->kodeAnggota ? $simpanans->whereHas(
            'anggota',
            function (Builder $query) use ($request) {
                return $query->where('kode', 'like', '%' . $request->kodeAnggota . '%');
            }
        ) : null;
        $anggotaTanpaSimpanan = Anggota::whereDoesntHave('simpanan')->get();
        $jenisSimpanan = JenisSimpanan::all('id', 'nama');
        $paginate = $simpanans->with('anggota', 'jenisSimpanan')->take(25)->paginate();
        $paginate->appends([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kodeAnggota' => $request->kodeAnggota,
            'kode' => $request->kode,
        ]);
        return Inertia::render('BMT/Simpanan', compact('paginate', 'anggotaTanpaSimpanan', 'jenisSimpanan'));
    }
    public function search2(Request $request)
    {
        $simpanans = Simpanan::orderBy('id');
        $simpanans->where('jenis_simpanan_id','=',11);
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
        $request->kodeAnggota ? $simpanans->whereHas(
            'anggota',
            function (Builder $query) use ($request) {
                return $query->where('kode', 'like', '%' . $request->kodeAnggota . '%');
            }
        ) : null;
        $anggotaTanpaSimpanan = Anggota::whereDoesntHave('simpanan')->get();
        $jenisSimpanan = JenisSimpanan::all('id', 'nama');
        $paginate = $simpanans->with('anggota', 'jenisSimpanan')->take(25)->paginate();
        $paginate->appends([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'kodeAnggota' => $request->kodeAnggota,
            'kode' => $request->kode,
        ]);
        return Inertia::render('BMT/Simpanan', compact('paginate', 'anggotaTanpaSimpanan', 'jenisSimpanan'));
    }
    public function active(Simpanan $simpanan)
    {
        $simpanan->restore();
        return back();
    }
}
