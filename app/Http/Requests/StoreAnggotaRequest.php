<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAnggotaRequest extends FormRequest
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
            'nama'=>'required',
            'no_ktp'=>'required',
            'alamat'=>'required',
            'telepon'=>'required',
            'pekerjaan'=>'required',
            'tanggal_lahir'=>'required',
            'nama_ibu_kandung'=>'required',
            'jenis_kelamin'=>'required',
            'karyawan_id'=>'required',
            'keterangan'=>'required',
        ];
    }
}
