<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\JenisSimpanan
 *
 * @property int $id
 * @property string $kode
 * @property string $nama
 * @property string $bahas
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\JenisSimpananFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisSimpanan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JenisSimpanan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JenisSimpanan query()
 * @method static \Illuminate\Database\Eloquent\Builder|JenisSimpanan whereBahas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisSimpanan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisSimpanan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisSimpanan whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisSimpanan whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisSimpanan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class JenisSimpanan extends Model
{
    use HasFactory;

    protected $table = 'jenis_simpanan';
    protected $guarded = [];

    public function simpanan()
    {
        return $this->hasMany(Simpanan::class);
    }
}
