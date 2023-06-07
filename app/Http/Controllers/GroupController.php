<?php

namespace App\Http\Controllers;

use App\Models\Group;
use App\Http\Requests\StoreGroupRequest;
use App\Http\Requests\UpdateGroupRequest;
use App\Models\Anggota;
use App\Services\BMTService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $groups = Group::with(['karyawan:id,nama', 'anggota:id,nama'])->get();
        // dd($groups);
        return Inertia::render('BMT/Group', compact('groups'));
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
     * @param  \App\Http\Requests\StoreGroupRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // dd($request->validated());
        Group::create($request->all());

        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group, Request $request, BMTService $bmt)
    {
        //

        $anggotas = $bmt->searchAnggota($request->all());
        $group->load(['anggota.simpanan', 'karyawan']);
        return Inertia::render('BMT/GroupDetail', [
            'parameter' => fn () => $request->all(),
            'group' => fn () =>  $group,
            'anggotas' => fn () => $anggotas,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateGroupRequest  $request
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        //
        $group->update($request->validated());
        $group->save();
        return back()->with('flash', [
            'response' => 'berhasil'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        //
        $group->delete();
        return redirect(route('group.index'));
    }

    public function addAnggota(Group $group, Request $request, Anggota $anggota)
    {
        $group->anggota()->attach($anggota, ['ke' => 2]);
        return back();
    }
    public function removeAnggota(Group $group, Request $request, Anggota $anggota)
    {
        $group->anggota()->detach($anggota);
        return back();
    }

    public function TakeOne(Group $group)
    {
        $group->load('anggota');
        return $group;
    }
}
