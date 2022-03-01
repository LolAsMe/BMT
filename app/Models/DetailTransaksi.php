<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\DetailTransaksi
 *
 * @method static \Database\Factories\DetailTransaksiFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailTransaksi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailTransaksi newQuery()
 * @method static \Illuminate\Database\Query\Builder|DetailTransaksi onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailTransaksi query()
 * @method static \Illuminate\Database\Query\Builder|DetailTransaksi withTrashed()
 * @method static \Illuminate\Database\Query\Builder|DetailTransaksi withoutTrashed()
 * @mixin \Eloquent
 */
class DetailTransaksi extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'detail_transaksi';
    protected $guarded = [];
}
