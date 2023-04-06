<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePembiayaanRequest extends FormRequest
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
            'nomor'=>'',
            'jenis_pembiayaan_id'=>'',
            'anggota_id'=>'',
            'karyawan_id'=>'',
            'tanggal_pinjam'=>'',
            'jumlah'=>'',
            'tanggal_jatuh_tempo'=>'',
            'pokok'=>'',
            'jasa'=>'',
            'potongan_pembiayaan'=>'',
            'total_pembiayaan'=>'',
            'frekuensi_angsuran'=>'',
            'jumlah_angsuran'=>'',
            'angsuran_diterima'=>'',
            'keterangan'=>'',
            'status'=>'',
        ];
    }
}
