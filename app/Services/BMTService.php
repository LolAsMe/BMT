<?php

namespace App\Services;

use App\Models\Anggota;

class BMTService
{
    public function searchAnggota(?array $parameter=[])
    {
        $anggotas = Anggota::where('id','like','%');
        if (isset($parameter['id'])) {
            return Anggota::whereId($parameter['id'])->get();
        }
        if(isset($parameter['kode'])){
            $anggotas->where('kode','like','%'.$parameter['kode'].'%');
        }
        if(isset($parameter['alamat'])){
            $anggotas->where('alamat','like','%'.$parameter['alamat'].'%');
        }
        if(isset($parameter['nama'])){
            $anggotas->where('nama','like','%'.$parameter['nama'].'%');
        }
        if(isset($parameter['no_rekening'])){
            $anggotas->whereHas('simpanan',function($query)use($parameter){
                $query->where('kode','like','%'.$parameter['no_rekening'].'%');
            });
        }


        return $anggotas->with('simpanan')->take(20)->get();
    }
}
