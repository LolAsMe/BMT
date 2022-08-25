<?php

namespace App\Services;

use App\Models\Anggota;

class BMTService
{
    private string $default_password;
    public function __construct($default_password = '123456')
    {
        $this->default_password = $default_password;
    }
    public function searchAnggota(?array $parameter = [])
    {
        $anggotas = Anggota::searchAnggota($parameter);
        $anggotas->whereDoesntHave('group');
        return $anggotas->with('simpanan')->take(20)->get();
    }
}
