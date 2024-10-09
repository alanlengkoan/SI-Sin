<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class PelaporanRequest extends FormRequest
{
    public $post;

    public function __construct(Request $request)
    {
        parent::__construct();

        $this->post = $request;
    }

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $rules['id_marketing']      = 'required';
        $rules['nama']              = 'required';
        $rules['alamat']            = 'required';
        $rules['no_hp']             = 'required';
        $rules['metode_pembayaran'] = 'required';
        $rules['keluhan']           = 'required';
        $rules['keterangan']        = 'required';

        if ($this->post->jenis === 'agen') {
            $rules['target']           = 'required';
            $rules['market']           = 'required';
            $rules['jumlah_ton']       = 'required';
            $rules['brand_kompetitor'] = 'required';
            $rules['harga_kompetitor'] = 'required';
        } else {
            $rules['komoditi']        = 'required';
            $rules['jumlah_kolam']    = 'required';
            $rules['luas']            = 'required';
            $rules['jumlah_ton']      = 'required';
            $rules['pakan']           = 'required';
            $rules['harga_pakan']     = 'required';
            $rules['jumlah_terpakai'] = 'required';
        }

        $rules['foto_satu']        = 'required|mimes:jpg,jpeg,png';
        $rules['foto_dua']         = 'required|mimes:jpg,jpeg,png';
        $rules['foto_tiga']        = 'required|mimes:jpg,jpeg,png';

        return $rules;
    }

    public function messages()
    {
        $messages['id_marketing.required']      = 'Marketing harus diisi!';
        $messages['nama.required']              = 'Nama harus diisi!';
        $messages['alamat.required']            = 'Alamat harus diisi!';
        $messages['no_hp.required']             = 'No. HP harus diisi!';
        $messages['metode_pembayaran.required'] = 'Metode pembayaran harus diisi!';
        $messages['keluhan.required']           = 'Keluhan harus diisi!';
        $messages['keterangan.required']        = 'Keterangan harus diisi!';

        if ($this->post->jenis === 'agen') {
            $messages['target.required']           = 'Target harus diisi!';
            $messages['market.required']           = 'Market harus diisi!';
            $messages['jumlah_ton.required']       = 'Jumlah ton harus diisi!';
            $messages['brand_kompetitor.required'] = 'Brand kompetitor harus diisi!';
            $messages['harga_kompetitor.required'] = 'Harga kompetitor harus diisi!';
        } else {
            $messages['komoditi.required']        = 'Komoditi harus diisi!';
            $messages['jumlah_kolam.required']    = 'Jumlah kolam harus diisi!';
            $messages['luas.required']            = 'Luas harus diisi!';
            $messages['jumlah_ton.required']      = 'Jumlah ton harus diisi!';
            $messages['pakan.required']           = 'Pakan harus diisi!';
            $messages['harga_pakan.required']     = 'Harga pakan harus diisi!';
            $messages['jumlah_terpakai.required'] = 'Jumlah terpakai harus diisi!';
        }

        $messages['foto_satu.required']        = 'Foto harus diisi!';
        $messages['foto_satu.mimes']           = 'File harus bertipe jpg, jpeg, png!';
        $messages['foto_dua.required']         = 'Foto harus diisi!';
        $messages['foto_dua.mimes']            = 'File harus bertipe jpg, jpeg, png!';
        $messages['foto_tiga.required']        = 'Foto harus diisi!';
        $messages['foto_tiga.mimes']           = 'File harus bertipe jpg, jpeg, png!';

        return $messages;
    }

    protected function failedValidation(Validator $validator)
    {
        $response = ['title'  => 'Gagal!', 'text'   => 'Data gagal ditambahkan!', 'type'   => 'error', 'button' => 'Okay!', 'class'  => 'danger', 'errors' => $validator->errors()];

        throw new HttpResponseException(Response::json($response));
    }
}
