<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\JenisAnggota
 *
 * @method static \Database\Factories\JenisAnggotaFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisAnggota newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JenisAnggota newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JenisAnggota query()
 * @mixin \Eloquent
 */
class JenisAnggota extends Model
{
    use HasFactory;
    protected $table = 'jenis_anggota';
    protected $guarded = [];
}
