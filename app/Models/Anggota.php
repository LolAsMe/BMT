<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\Anggota
 *
 * @property int $id
 * @property string|null $kode
 * @property string $nama
 * @property string|null $no_ktp
 * @property string $alamat
 * @property string $telepon
 * @property string|null $pekerjaan
 * @property string $tempat_lahir
 * @property string $tanggal_lahir
 * @property string $tanggal_masuk
 * @property string|null $nama_ibu_kandung
 * @property string $jenis_kelamin
 * @property int $karyawan_id
 * @property string|null $keterangan
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Group[] $group
 * @property-read int|null $group_count
 * @property-read \App\Models\Karyawan|null $karyawan
 * @property-read \App\Models\Simpanan|null $simpanan
 * @method static \Database\Factories\AnggotaFactory factory(...$parameters)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota newQuery()
 * @method static \Illuminate\Database\Query\Builder|Anggota onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota query()
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota searchAnggota(array $attribute)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereAlamat($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereJenisKelamin($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereKaryawanId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereKeterangan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereKode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereNama($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereNamaIbuKandung($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereNoKtp($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota wherePekerjaan($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereTanggalLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereTanggalMasuk($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereTelepon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereTempatLahir($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Anggota whereUpdatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|Anggota withTrashed()
 * @method static \Illuminate\Database\Query\Builder|Anggota withoutTrashed()
 * @mixin \Eloquent
 */
class Anggota extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'anggota';
    protected $guarded = [];

    public function karyawan()
    {
        return $this->hasOne(Karyawan::class);
    }
    public function simpanan()
    {
        return $this->hasOne(Simpanan::class);
    }

    public function group()
    {
        return $this->belongsToMany(Group::class, 'group_anggota', 'anggota_id', 'group_id');
    }

    public function scopeSearchAnggota($query, array $attribute)
    {
        if (isset($attribute['id'])) {
            return $query->where('id',$attribute['id']);
        }
        if(isset($attribute['kode'])){
            $query->where('kode','like','%'.$attribute['kode'].'%');
        }
        if(isset($attribute['alamat'])){
            $query->where('alamat','like','%'.$attribute['alamat'].'%');
        }
        if(isset($attribute['nama'])){
            $query->where('nama','like','%'.$attribute['nama'].'%');
        }
        if(isset($attribute['no_rekening'])){
            $query->whereHas('simpanan',function($query)use($attribute){
                $query->where('kode','like','%'.$attribute['no_rekening'].'%');
            });
        }
        return $query;
    }

}
