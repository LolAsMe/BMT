<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Anggunan
 *
 * @property int $id
 * @property int $pembiayaan_id
 * @property string|null $kode
 * @property string $jenis_objek
 * @property string|null $nomor_polisi
 * @property string $tanggal_masuk
 * @property string|null $tanggal_ambil
 * @property string|null $tahun_pembuatan
 * @property string|null $luas_objek
 * @property string|null $letak_objek
 * @property string $nama_pemilik
 * @property string $alamat_pemilik
 * @property int|null $karyawan_id
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Database\Factories\AnggunanFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggunan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Anggunan newQuery()
 * @method static \Illuminate\Database\Query\Builder|Anggunan onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Anggunan query()
 * @method static \Illuminate\Database\Eloquent\Builder|Anggunan whereAlamatPemilik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggunan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggunan whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggunan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggunan whereJenisObjek($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggunan whereKaryawanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggunan whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggunan whereLetakObjek($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggunan whereLuasObjek($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggunan whereNamaPemilik($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggunan whereNomorPolisi($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggunan wherePembiayaanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggunan whereTahunPembuatan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggunan whereTanggalAmbil($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggunan whereTanggalMasuk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggunan whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Anggunan withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Anggunan withoutTrashed()
 * @mixin \Eloquent
 */
class Anggunan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'anggunan';
    protected $guarded = [];
}
