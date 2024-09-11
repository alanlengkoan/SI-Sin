<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;

class GaleriRequest extends FormRequest
{
    public $post;

    public function __construct(Request $request)
    {
        parent::__construct();

        $this->post = $request;
    }

    public function rules()
    {
        if ($this->post->id_galeri === null) {
            if ($this->post->jenis === 'url') {
                $rules['url'] = 'required';
            } else {
                $rules['file'] = 'required|mimes:jpg,jpeg,png,mp4';
            }
        } else {
            if ($this->post->jenis === 'url') {
                $rules['url'] = 'required';
            } else {
                if (isset($this->post->change_picture) && $this->post->change_picture === 'on') {
                    $rules['file'] = 'required|mimes:jpg,jpeg,png,mp4';
                }
            }
        }

        $rules['jenis'] = 'required';

        return $rules;
    }

    public function messages()
    {
        if ($this->post->id_galeri === null) {
            if ($this->post->jenis === 'url') {
                $messages['url.required'] = 'Url harus diisi!';
            } else {
                $messages['file.required'] = 'File harus diisi!';
                $messages['file.mimes']    = 'File harus berupa file JPG, JPEG, PNG, MP4!';
            }
        } else {
            if ($this->post->jenis === 'url') {
                $messages['url.required'] = 'Url harus diisi!';
            } else {
                if (isset($this->post->change_picture) && $this->post->change_picture === 'on') {
                    $messages['file.required'] = 'File harus diisi!';
                    $messages['file.mimes']    = 'File harus berupa file JPG, JPEG, PNG, MP4!';
                }
            }
        }

        $messages['jenis.required'] = 'Jenis harus diisi!';

        return $messages;
    }

    protected function failedValidation(Validator $validator)
    {
        $response = ['title'  => 'Gagal!', 'text'   => 'Data gagal ditambahkan!', 'type'   => 'error', 'button' => 'Okay!', 'class'  => 'danger', 'errors' => $validator->errors()];

        throw new HttpResponseException(Response::json($response));
    }
}
