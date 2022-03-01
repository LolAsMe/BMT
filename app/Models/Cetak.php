<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Cetak
 *
 * @property int $id
 * @property string $kode
 * @property string $tanggal
 * @property string $sandi
 * @property string $debit
 * @property string $kredit
 * @property string $saldo
 * @property int $karyawan_id
 * @property int $simpanan_id
 * @property int $no_urut
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\CetakFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Cetak newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Cetak newQuery()
 * @method static \Illuminate\Database\Query\Builder|Cetak onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Cetak query()
 * @method static \Illuminate\Database\Eloquent\Builder|Cetak whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cetak whereDebit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cetak whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cetak whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cetak whereKaryawanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cetak whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cetak whereKredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cetak whereNoUrut($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cetak whereSaldo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cetak whereSandi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cetak whereSimpananId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cetak whereTanggal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Cetak whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Cetak withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Cetak withoutTrashed()
 * @mixin \Eloquent
 */
class Cetak extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'cetak';
    protected $guarded = [];
}
