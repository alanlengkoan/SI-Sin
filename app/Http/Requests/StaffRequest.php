<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class StaffRequest extends FormRequest
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
        if ($this->post->id_staff === null) {
            $rules['foto']  = 'required|mimes:jpg,jpeg,png';
        } else {
            if (isset($this->post->change_picture) && $this->post->change_picture === 'on') {
                $rules['foto']  = 'required|mimes:jpg,jpeg,png';
            }
        }

        $rules['id_agama']      = 'required';
        $rules['id_jabatan']    = 'required';
        $rules['id_pendidikan'] = 'required';
        $rules['nama']          = 'required';
        $rules['kelamin']       = 'required';
        $rules['tgl_lahir']     = 'required';
        $rules['tmp_lahir']     = 'required';
        $rules['alamat']        = 'required';

        return $rules;
    }

    public function messages()
    {
        if ($this->post->id_staff === null) {
            $messages['foto.required']  = 'Foto harus diisi!';
            $messages['foto.mimes']     = 'Foto harus berupa file JPG, JPEG, PNG!';
        } else {
            if (isset($this->post->change_picture) && $this->post->change_picture === 'on') {
                $messages['foto.required']  = 'Foto harus diisi!';
                $messages['foto.mimes']     = 'Foto harus berupa file JPG, JPEG, PNG!';
            }
        }

        $messages['id_agama.required']      = 'Agama harus diisi!';
        $messages['id_jabatan.required']    = 'Jabatan harus diisi!';
        $messages['id_pendidikan.required'] = 'Pendidikan harus diisi!';
        $messages['nama.required']          = 'Nama harus diisi!';
        $messages['kelamin.required']       = 'Kelamin harus diisi!';
        $messages['tgl_lahir.required']     = 'Tgl Lahir harus diisi!';
        $messages['tmp_lahir.required']     = 'Tmp Lahir harus diisi!';
        $messages['alamat.required']        = 'Alamat harus diisi!';

        return $messages;
    }

    protected function failedValidation(Validator $validator)
    {
        $response = ['title'  => 'Gagal!', 'text'   => 'Data gagal ditambahkan!', 'type'   => 'error', 'button' => 'Okay!', 'class'  => 'danger', 'errors' => $validator->errors()];

        throw new HttpResponseException(Response::json($response));
    }
}
