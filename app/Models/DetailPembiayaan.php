<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\DetailPembiayaan
 *
 * @property int $id
 * @property int $pembiayaan_id
 * @property int $karyawan_id
 * @property int $angsuran_ke
 * @property string $jumlah
 * @property string $akumulasi_angsuran
 * @property string $total_tanggungan
 * @property string|null $keterangan
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\DetailPembiayaanFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPembiayaan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPembiayaan newQuery()
 * @method static \Illuminate\Database\Query\Builder|DetailPembiayaan onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPembiayaan query()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPembiayaan whereAkumulasiAngsuran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPembiayaan whereAngsuranKe($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPembiayaan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPembiayaan whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPembiayaan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPembiayaan whereJumlah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPembiayaan whereKaryawanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPembiayaan whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPembiayaan wherePembiayaanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPembiayaan whereTotalTanggungan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailPembiayaan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|DetailPembiayaan withTrashed()
 * @method static \Illuminate\Database\Query\Builder|DetailPembiayaan withoutTrashed()
 * @mixin \Eloquent
 */
class DetailPembiayaan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'detail_pembiayaan';
    protected $guarded = [];

    public function pembiayaan()
    {
        $this->belongsTo(Pembiayaan::class);
    }

    public function transaksi()
    {
        return $this->morphOne(Transaksi::class,'log');
    }
}
