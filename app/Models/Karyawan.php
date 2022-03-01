<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

/**
 * App\Models\Karyawan
 *
 * @property int $id
 * @property string $kode
 * @property string $nama
 * @property string $alamat
 * @property string $no_telepon
 * @property int $jabatan_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Anggota[] $anggota
 * @property-read int|null $anggota_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Group[] $group
 * @property-read int|null $group_count
 * @property-read \App\Models\Jabatan|null $jabatan
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\KaryawanFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Karyawan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Karyawan newQuery()
 * @method static \Illuminate\Database\Query\Builder|Karyawan onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Karyawan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Karyawan whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Karyawan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Karyawan whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Karyawan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Karyawan whereJabatanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Karyawan whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Karyawan whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Karyawan whereNoTelepon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Karyawan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Karyawan withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Karyawan withoutTrashed()
 * @mixin \Eloquent
 */
class Karyawan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'karyawan';
    protected $guarded = [];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function group()
    {
        return $this->hasMany(Group::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function anggota()
    {
        return $this->hasMany(Anggota::class);
    }

    public function getNamaAttribute($value)
    {
        $value2 = Str::lower($value);
        return ucfirst($value2);
    }
}
