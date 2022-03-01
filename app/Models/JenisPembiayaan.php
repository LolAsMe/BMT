<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\JenisPembiayaan
 *
 * @property int $id
 * @property string $kode
 * @property string $nama
 * @property string $bahas
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\JenisPembiayaanFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisPembiayaan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JenisPembiayaan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|JenisPembiayaan query()
 * @method static \Illuminate\Database\Eloquent\Builder|JenisPembiayaan whereBahas($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisPembiayaan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisPembiayaan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisPembiayaan whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisPembiayaan whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|JenisPembiayaan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class JenisPembiayaan extends Model
{
    use HasFactory;

    protected $table = 'jenis_pembiayaan';
    protected $guarded = [];
}
