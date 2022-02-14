<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailPembiayaan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'detail_pembiayaan';
    protected $guarded = [];

    public function pembiayaan()
    {
        $this->belongsTo(Pembiayaan::class);
    }
}
