<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Support\Facades\Response;

class MedsosRequest extends FormRequest
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

    public function rules()
    {
        return [
            'nama'     => 'required',
            'icon'     => 'required',
            'url'      => 'required',
            'username' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'nama.required'     => 'Nama harus diisi!',
            'icon.required'     => 'Icon harus diisi!',
            'url.required'      => 'URL harus diisi!',
            'username.required' => 'Username harus diisi!',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $response = ['title'  => 'Gagal!', 'text'   => 'Data gagal ditambahkan!', 'type'   => 'error', 'button' => 'Okay!', 'class'  => 'danger', 'errors' => $validator->errors()];

        throw new HttpResponseException(Response::json($response));
    }
}
