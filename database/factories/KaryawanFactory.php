<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class KaryawanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            "kode" => "KR01",
            "nama" => $this->faker->name(),
            "alamat" => "Boyolali",
            "no_telepon" => "08912389",
            "jabatan_id" => "1",
            "created_at"=>now(),
            'updated_at'=>now(),
        ];
    }
}
