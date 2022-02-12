<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAnggunanRequest extends FormRequest
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
            'pembiayaan_id'=>'required',
            'kode'=>'',
            'jenis_objek'=>'',
            'nomor_polisi'=>'',
            'tanggal_masuk'=>'',
            'tanggal_ambil'=>'',
            'tahun_pembuatan'=>'',
            'luas_objek'=>'',
            'letak_objek'=>'',
            'nama_pemilik'=>'',
            'alamat_pemilik'=>'',
            'karyawan_id'=>'',
        ];
    }
}
