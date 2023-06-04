<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\DetailNisbah
 *
 * @property int $id
 * @property int $nisbah_id
 * @property int $pengendapan_id
 * @property int $detail_simpanan_id
 * @property int $pengendapan
 * @property string $hasil
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\DetailNisbahFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailNisbah newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailNisbah newQuery()
 * @method static \Illuminate\Database\Query\Builder|DetailNisbah onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailNisbah query()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailNisbah whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailNisbah whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailNisbah whereDetailSimpananId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailNisbah whereHasil($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailNisbah whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailNisbah whereNisbahId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailNisbah wherePengendapan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailNisbah wherePengendapanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailNisbah whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|DetailNisbah withTrashed()
 * @method static \Illuminate\Database\Query\Builder|DetailNisbah withoutTrashed()
 * @mixin \Eloquent
 */
class DetailNisbah extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'detail_nisbah';
    protected $guarded = [];

    public function nisbah()
    {
        return $this->belongsTo(Nisbah::class);
    }
}
