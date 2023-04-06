<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\Simpanan
 *
 * @property int $id
 * @property string|null $kode
 * @property int $anggota_id
 * @property int $jenis_simpanan_id
 * @property string $jumlah
 * @property string $tanggal_pembuatan
 * @property string $keterangan
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Anggota|null $anggota
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DetailSimpanan[] $detail
 * @property-read int|null $detail_count
 * @method static \Database\Factories\SimpananFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Simpanan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Simpanan newQuery()
 * @method static \Illuminate\Database\Query\Builder|Simpanan onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Simpanan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Simpanan whereAnggotaId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Simpanan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Simpanan whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Simpanan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Simpanan whereJenisSimpananId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Simpanan whereJumlah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Simpanan whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Simpanan whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Simpanan whereTanggalPembuatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Simpanan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Simpanan withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Simpanan withoutTrashed()
 * @mixin \Eloquent
 */
class Kas extends \Eloquent
{
    use HasFactory;

    protected $table = 'kas';
    protected $guarded = [];

    public function detail()
    {
        return $this->hasMany(DetailKas::class);
    }
    public function getJumlahAttribute($value)
    {
        return (int)$value;
    }

}
