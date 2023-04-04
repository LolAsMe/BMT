<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\TransaksiHarian
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
 * @method static \Database\Factories\TransaksiHarianFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|TransaksiHarian newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|TransaksiHarian newQuery()
 * @method static \Illuminate\Database\Query\Builder|TransaksiHarian onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|TransaksiHarian query()
 * @method static \Illuminate\Database\Eloquent\Builder|TransaksiHarian whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransaksiHarian whereDebit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransaksiHarian whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransaksiHarian whereKaryawanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransaksiHarian whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransaksiHarian whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransaksiHarian whereKredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransaksiHarian whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransaksiHarian whereTanggalSlip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransaksiHarian whereTanggalTransaksiHarian($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransaksiHarian whereTransaksiHarianId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|TransaksiHarian whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|TransaksiHarian withTrashed()
 * @method static \Illuminate\Database\Query\Builder|TransaksiHarian withoutTrashed()
 * @mixin \Eloquent
 */
class TransaksiHarian extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'transaksi_harian';
    protected $guarded = [];

    public function transaksi()
    {
        return $this->hasMany(Transaksi::class);
    }
}
