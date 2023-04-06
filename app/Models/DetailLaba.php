<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailLaba extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'detail_laba';
    protected $guarded = [];

    public function laba()
    {
        $this->belongsTo(Laba::class);
    }
    public function getDebitAttribute($value)
    {
        return (int)$value;
    }

    public function getKreditAttribute($value)
    {
        return (int)$value;
    }
    public function getSaldoAwalAttribute($value)
    {
        return (int)$value;
    }
    public function getSaldoAkhirAttribute($value)
    {
        return (int)$value;
    }
}
