<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Simpanan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'simpanan';
    protected $guarded = [];

    public function detail()
    {
        return $this->hasMany(DetailSimpanan::class);
    }
}
