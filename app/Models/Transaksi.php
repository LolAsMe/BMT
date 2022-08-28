<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Transaksi
 *
 * @property int $id
 * @property int $transaksi_id
 * @property string $kode
 * @property string $nama
 * @property string $keterangan
 * @property string $debit
 * @property string $kredit
 * @property string $tanggal_transaksi
 * @property string $tanggal_slip
 * @property int $karyawan_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\TransaksiFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi newQuery()
 * @method static \Illuminate\Database\Query\Builder|Transaksi onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi query()
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereDebit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereKaryawanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereKredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereTanggalSlip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereTanggalTransaksi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereTransaksiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Transaksi whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Transaksi withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Transaksi withoutTrashed()
 * @mixin \Eloquent
 */
class Transaksi extends Model
{
    use HasFactory;
    // use SoftDeletes;

    protected $table = 'transaksi';
    protected $guarded = [];

    public function log()
    {
        return $this->morphTo();
    }
}
