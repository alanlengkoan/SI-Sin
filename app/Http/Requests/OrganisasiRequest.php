<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class OrganisasiRequest extends FormRequest
{
    public $post;

    public function __construct(Request $request)
    {
        parent::__construct();

        $this->post = $request;
    }

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
        if ($this->post->id_organisasi === null) {
            $rules['gambar'] = 'required|mimes:jpg,jpeg,png';
        } else {
            if (isset($this->post->change_picture) && $this->post->change_picture === 'on') {
                $rules['gambar'] = 'required|mimes:jpg,jpeg,png';
            }
        }

        $rules['nama']      = 'required';
        $rules['deskripsi'] = 'required';

        return $rules;
    }

    public function messages()
    {
        if ($this->post->id_organisasi === null) {
            $messages['gambar.required'] = 'Gambar harus diisi!';
            $messages['gambar.mimes']    = 'Gambar harus berupa file JPG, JPEG, PNG!';
        } else {
            if (isset($this->post->change_picture) && $this->post->change_picture === 'on') {
                $messages['gambar.required'] = 'Gambar harus diisi!';
                $messages['gambar.mimes']    = 'Gambar harus berupa file JPG, JPEG, PNG!';
            }
        }

        $messages['nama.required']      = 'Nama harus diisi!';
        $messages['deskripsi.required'] = 'Deskripsi harus diisi!';

        return $messages;
    }

    protected function failedValidation(Validator $validator)
    {
        $response = ['title'  => 'Gagal!', 'text'   => 'Data gagal ditambahkan!', 'type'   => 'error', 'button' => 'Okay!', 'class'  => 'danger', 'errors' => $validator->errors()];

        throw new HttpResponseException(Response::json($response));
    }
}
