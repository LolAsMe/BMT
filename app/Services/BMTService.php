<?php

namespace App\Services;

use App\Models\Anggota;

class BMTService
{
    public function searchAnggota(?array $parameter=[])
    {
        $anggotas = Anggota::searchAnggota($parameter);
        $anggotas->whereDoesntHave('group');
        return $anggotas->with('simpanan')->take(20)->get();
    }
}
