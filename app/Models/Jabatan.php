<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * App\Models\Jabatan
 *
 * @property int $id
 * @property string $kode
 * @property string $nama
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Anggota[] $anggota
 * @property-read int|null $anggota_count
 * @method static \Database\Factories\JabatanFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Jabatan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Jabatan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Jabatan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Jabatan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jabatan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jabatan whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jabatan whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Jabatan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Jabatan extends Model
{
    use HasFactory;

    protected $table = 'jabatan';
    protected $guarded = [];

    public function anggota()
    {
        return $this->hasMany(Anggota::class);
    }

    /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getNamaAttribute($value)
    {
        $value2 = Str::lower($value);
        return ucfirst($value2);
    }
}
