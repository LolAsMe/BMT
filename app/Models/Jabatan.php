<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Jabatan extends Model
{
    use HasFactory;

    protected $table = 'jabatan';
    protected $guarded = [];

    public function anggota()
    {
        return $this->hasMany(Anggota::class);
    }

    /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getNamaAttribute($value)
    {
        $value2 = Str::lower($value);
        return ucfirst($value2);
    }
}
