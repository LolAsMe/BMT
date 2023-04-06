<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Laba extends Model
{
    use HasFactory;

    protected $table = 'laba';
    protected $guarded = [];

    public function detail()
    {
        return $this->hasMany(DetailLaba::class);
    }

    public static function labaThisMonth(): Laba
    {
        $laba = Laba::firstOrCreate([
            'kode' => now()->format("m-Y")
        ], [
            'bulan' => now()->format("m-Y"),
            "jumlah" => 0
        ]);
        return $laba;
    }
    public function getJumlahAttribute($value)
    {
        return (int)$value;
    }
}
