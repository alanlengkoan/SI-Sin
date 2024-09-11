<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Pengaturan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Validator;

class PengaturanController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $data = [
            'sekolah' => Pengaturan::where('for', 'sekolah')->get(),
            'kontak'  => Pengaturan::where('for', 'kontak')->get(),
        ];

        return Template::load('admin', 'Pengaturan', 'pengaturan', 'view', $data);
    }

    public function save(Request $request)
    {
        $post = $request->all();

        foreach ($post as $key => $value) {
            $rules[$key] = 'required';

            $messages[$key . '.required'] = 'Field ' . $key . ' harus diisi!';

            if ($request->change_gambar === 'on') {
                $rules['picture'] = 'required|mimes:jpg,jpeg,png';

                $messages['picture.required'] = 'Gambar harus diisi!';
                $messages['picture.mimes']    = 'Gambar harus berupa file JPG, JPEG, PNG!';
            }
        }

        $validator = Validator::make($post, $rules, $messages);

        if ($validator->fails()) {
            $response = ['title'  => 'Gagal!', 'text'   => 'Data gagal ditambahkan!', 'type'   => 'error', 'button' => 'Okay!', 'class'  => 'danger', 'errors' => $validator->errors()];

            return Response::json($response);
        }

        try {
            foreach ($post as $key => $value) {
                $pengaturan = Pengaturan::where('key', $key)->first();

                if ($pengaturan) {
                    if (isset($request->change_gambar) && $request->change_gambar === 'on') {
                        if ($pengaturan->type === 'file') {
                            $pengaturan->value = upd_picture($value, $pengaturan->value, 'sekolah/');
                        }
                    } else {
                        $pengaturan->value = $value;
                    }

                    $pengaturan->save();
                }
            }

            $response = ['title' => 'Berhasil!', 'text' => 'Data Sukses di Simpan!', 'type' => 'success', 'button' => 'Okay!', 'class' => 'success'];
        } catch (\Exception $e) {
            $response = ['title' => 'Gagal!', 'text' => 'Data Gagal di Simpan!', 'type' => 'error', 'button' => 'Okay!', 'class' => 'danger'];
        }

        return Response::json($response);
    }
}
