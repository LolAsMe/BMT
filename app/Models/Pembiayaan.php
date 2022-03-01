<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


/**
 * App\Models\Pembiayaan
 *
 * @property int $id
 * @property string $kode
 * @property string $nomor
 * @property int $jenis_pembiayaan_id
 * @property int $simpanan_id
 * @property int $karyawan_id
 * @property string $tanggal_pinjam
 * @property string $jumlah
 * @property string $tanggal_jatuh_tempo
 * @property string $pokok
 * @property string $jasa
 * @property string $potongan_pembiayaan
 * @property string $total_pembiayaan
 * @property int $frekuensi_angsuran
 * @property string $jumlah_angsuran
 * @property string $angsuran_diterima
 * @property string|null $keterangan
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\DetailPembiayaan[] $detail
 * @property-read int|null $detail_count
 * @method static \Database\Factories\PembiayaanFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembiayaan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Pembiayaan newQuery()
 * @method static \Illuminate\Database\Query\Builder|Pembiayaan onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Pembiayaan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Pembiayaan whereAngsuranDiterima($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembiayaan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembiayaan whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembiayaan whereFrekuensiAngsuran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembiayaan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembiayaan whereJasa($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembiayaan whereJenisPembiayaanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembiayaan whereJumlah($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembiayaan whereJumlahAngsuran($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembiayaan whereKaryawanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembiayaan whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembiayaan whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembiayaan whereNomor($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembiayaan wherePokok($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembiayaan wherePotonganPembiayaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembiayaan whereSimpananId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembiayaan whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembiayaan whereTanggalJatuhTempo($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembiayaan whereTanggalPinjam($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembiayaan whereTotalPembiayaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Pembiayaan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Pembiayaan withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Pembiayaan withoutTrashed()
 * @mixin \Eloquent
 */
class Pembiayaan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'pembiayaan';
    protected $guarded = [];

    public function detail()
    {
        return $this->hasMany(DetailPembiayaan::class);
    }
}
