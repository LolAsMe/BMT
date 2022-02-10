<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
    use Illuminate\Database\Eloquent\Model;

class Nisbah extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'nisbah';
    protected $guarded = [];
}
