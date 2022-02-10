<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DetailSimpanan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'detail_simpanan';
    protected $guarded = [];
}
