<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
    use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Nisbah
 *
 * @property int $id
 * @property string $kode
 * @property string $bulan
 * @property int $simpanan_id
 * @property string $pengendapan
 * @property string $tabungan
 * @property string $nisbah
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DetailNisbah[] $detail
 * @property-read int|null $detail_count
 * @method static \Database\Factories\NisbahFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Nisbah newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Nisbah newQuery()
 * @method static \Illuminate\Database\Query\Builder|Nisbah onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Nisbah query()
 * @method static \Illuminate\Database\Eloquent\Builder|Nisbah whereBulan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nisbah whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nisbah whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nisbah whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nisbah whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nisbah whereNisbah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nisbah wherePengendapan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nisbah whereSimpananId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nisbah whereTabungan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Nisbah whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Nisbah withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Nisbah withoutTrashed()
 * @mixin \Eloquent
 */
class Nisbah extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'nisbah';
    protected $guarded = [];

    public function detail()
    {
        return $this->hasMany(DetailNisbah::class);
    }
}
