<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Karyawan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'karyawan';
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function group()
    {
        return $this->hasMany(Group::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function anggota()
    {
        return $this->hasMany(Anggota::class);
    }

    public function getNamaAttribute($value)
    {
        $value2 = Str::lower($value);
        return ucfirst($value2);
    }
}
