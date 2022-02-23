<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Anggota extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'anggota';
    protected $guarded = [];

    public function karyawan()
    {
        return $this->hasOne(Karyawan::class);
    }
    public function simpanan()
    {
        return $this->hasOne(Simpanan::class);
    }

    public function group()
    {
        return $this->belongsToMany(Group::class, 'group_anggota', 'anggota_id', 'group_id');
    }
}
