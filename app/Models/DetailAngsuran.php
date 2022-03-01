<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\DetailAngsuran
 *
 * @method static \Database\Factories\DetailAngsuranFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailAngsuran newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailAngsuran newQuery()
 * @method static \Illuminate\Database\Query\Builder|DetailAngsuran onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailAngsuran query()
 * @method static \Illuminate\Database\Query\Builder|DetailAngsuran withTrashed()
 * @method static \Illuminate\Database\Query\Builder|DetailAngsuran withoutTrashed()
 * @mixin \Eloquent
 */
class DetailAngsuran extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'detail_angsuran';
    protected $guarded = [];
}
