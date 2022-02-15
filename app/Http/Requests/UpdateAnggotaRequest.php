<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAnggotaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            //
            'kode'=>'',
            'nama'=>'',
            'no_ktp'=>'',
            'alamat'=>'',
            'telepon'=>'',
            'pekerjaan'=>'',
            'tempat_lahir'=>'',
            'tanggal_lahir'=>'',
            'tanggal_masuk'=>'',
            'nama_ibu_kandung'=>'',
            'jenis_kelamin'=>'',
            'karyawan_id'=>'',
            'keterangan'=>'',
        ];
    }
}
