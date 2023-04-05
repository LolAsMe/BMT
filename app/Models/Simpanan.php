<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
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
class Simpanan extends \Eloquent
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'simpanan';
    protected $guarded = [];

    public function detail()
    {
        return $this->hasMany(DetailSimpanan::class);
    }

    public function anggota()
    {
        return $this->belongsTo(Anggota::class);
    }

    public function tambahInvestasi($attribute = [])
    {
        if ($this->jenis_simpanan_id == 11) {
            $attribute;
            $this->nisbah()->create([
                'kode' => '0001',
                'tanggal_awal' => now(),
                'tanggal_selesai' => now()->addMonth(3),
                'awal' => '3000000',
                'jumlah' => '0',
            ]);
        }
    }

    public function nisbah()
    {
        return $this->hasMany(Nisbah::class);
    }
    public function jenisSimpanan()
    {
        return $this->belongsTo(JenisSimpanan::class);
    }
}
