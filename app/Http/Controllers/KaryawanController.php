<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Http\Requests\StoreKaryawanRequest;
use App\Http\Requests\UpdateKaryawanRequest;
use App\Models\User;
use App\Services\KodeGeneratorService;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     */
    public function index()
    {
        //
        $karyawans = Karyawan::with('jabatan:id,nama')->get();
        return Inertia::render('BMT/Karyawan2', compact('karyawans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreKaryawanRequest  $request
     */
    public function store(StoreKaryawanRequest $request, KodeGeneratorService $kodeGeneratorService)
    {
        //
        // dd($request->validated());
        $attribute = $request->all();
        $karyawanAttribute = $request->validated();
        $karyawanAttribute['kode'] = $kodeGeneratorService->generateKodeKaryawan();
        $karyawan = Karyawan::create($karyawanAttribute);
        $userAttribute = [];
        $userAttribute['name'] = $attribute['nama'];
        $userAttribute['email'] = $attribute['email'];
        $userAttribute['password'] = Hash::make($attribute['password']);

        $karyawan->user()->create($userAttribute);

        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     */
    public function show(Karyawan $karyawan)
    {
        //
        $karyawan->load(['jabatan:id,nama', 'anggota.simpanan', 'user']);

        // dd($karyawan);
        return Inertia::render('BMT/KaryawanDetail', compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Karyawan  $karyawan
     */
    public function edit(Karyawan $karyawan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateKaryawanRequest  $request
     * @param  \App\Models\Karyawan  $karyawan
     */
    public function update(UpdateKaryawanRequest $request, Karyawan $karyawan)
    {
        //
        $karyawan->update($request->validated());
        $karyawan->save();
        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Karyawan  $karyawan
     */
    public function destroy(Karyawan $karyawan)
    {
        //
        $karyawan->delete();
        return redirect(route('karyawan.index'));
    }

    public function active(Karyawan $karyawan)
    {
        $karyawan->restore();
        return back();
    }
    public function userEdit(User $user,Request $request)
    {
        // dd($user);
        $attribute = $request->all();
        $userAttribute = [];
        $userAttribute['name'] = $attribute['name'];
        $userAttribute['email'] = $attribute['email'];
        $userAttribute['password'] = Hash::make($attribute['password']);
        $user->update($userAttribute);
        $user->save();
        return back();
    }
}
