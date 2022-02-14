<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDetailPembiayaanRequest extends FormRequest
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
            'karyawan_id'=>'',
            'angsuran_ke'=>'',
            'jumlah'=>'',
            'akumulasi_angsuran'=>'',
            'total_tanggungan'=>'',
            'keterangan'=>'',
        ];
    }
}
