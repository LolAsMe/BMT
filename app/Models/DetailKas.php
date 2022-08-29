<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\DetailSimpanan
 *
 * @property int $id
 * @property int $simpanan_id
 * @property string|null $kode
 * @property int|null $transaksi_id
 * @property string $tanggal_transaksi
 * @property string $tanggal_slip
 * @property string $debit
 * @property string $kredit
 * @property string $saldo_awal
 * @property string $saldo_akhir
 * @property string|null $keterangan
 * @property int $karyawan_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\DetailSimpananFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailSimpanan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailSimpanan newQuery()
 * @method static \Illuminate\Database\Query\Builder|DetailSimpanan onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailSimpanan query()
 * @method static \Illuminate\Database\Eloquent\Builder|DetailSimpanan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailSimpanan whereDebit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailSimpanan whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailSimpanan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailSimpanan whereKaryawanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailSimpanan whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailSimpanan whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailSimpanan whereKredit($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailSimpanan whereSaldoAkhir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailSimpanan whereSaldoAwal($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailSimpanan whereSimpananId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailSimpanan whereTanggalSlip($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailSimpanan whereTanggalTransaksi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailSimpanan whereTransaksiId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|DetailSimpanan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|DetailSimpanan withTrashed()
 * @method static \Illuminate\Database\Query\Builder|DetailSimpanan withoutTrashed()
 * @mixin \Eloquent
 */
class DetailKas extends Model
{
    // 'kode'=>'kode1',
    //         'tanggal_transaksi'=>now(),
    //         'tanggal_slip'=>now(),
    //         'debit'=>0,
    //         'kredit'=>$jumlahSetoran,
    //         'saldo_awal'=>$this->curSimpanan->jumlah,
    //         'saldo_akhir'=>$this->curSimpanan->jumlah+$jumlahSetoran,
    //         'keterangan'=>'OK',
    //         'karyawan_id'=>auth('web')->user()->karyawan_id,
    use HasFactory;
    use SoftDeletes;

    protected $table = 'detail_kas';
    protected $guarded = [];

    public function kas()
    {
        $this->belongsTo(Kas::class);
    }

    public function transaksi()
    {
        return $this->morphOne(Transaksi::class,'log');
    }
}
