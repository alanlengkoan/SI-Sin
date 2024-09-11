<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfilRequest;
use App\Libraries\Template;
use App\Models\Profil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;

class ProfilController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        // for checking permission
        $this->middleware('permission:profil-read', ['only' => ['index']]);
    }

    public function index()
    {
        return Template::load('admin', 'Profil', 'profil', 'view');
    }

    public function get_data_dt()
    {
        $data = Profil::latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('gambar', function ($row) {
                return '<img src="' . asset_upload('picture/profil/' . $row->gambar) . '" class="img-fluid" width="100px">';
            })
            ->addColumn('deskripsi', function ($row) {
                return $row->deskripsi;
            })
            ->addColumn('action', function ($row) {
                return '
                    <button type="button" id="upd" data-id="' . my_encrypt($row->id_profil) . '" class="btn btn-sm btn-action btn-relief-primary" data-bs-toggle="modal" data-bs-target="#modal-add-upd"><i data-feather="edit"></i>&nbsp;<span>Ubah</span></button>&nbsp;
                    <button type="button" id="del" data-id="' . my_encrypt($row->id_profil) . '" class="btn btn-sm btn-action btn-relief-danger"><i data-feather="trash"></i>&nbsp;<span>Hapus</span></button>
                ';
            })
            ->rawColumns(['gambar', 'deskripsi', 'action'])
            ->make(true);
    }

    public function show(Request $request)
    {
        $response = Profil::find(my_decrypt($request->id));

        return Response::json($response);
    }

    public function save(ProfilRequest $request)
    {
        try {
            if ($request->id_profil === null) {
                $gambar = add_picture($request->gambar, 'profil/');

                $profil            = new Profil();
                $profil->nama      = $request->nama;
                $profil->slug      = Str::slug($request->nama, '-');
                $profil->gambar    = $gambar;
                $profil->deskripsi = $request->deskripsi;
                $profil->by_users  = $this->session->id;
                $profil->save();
            } else {
                $profil = Profil::find($request->id_profil);

                if (isset($request->change_picture) && $request->change_picture === 'on') {
                    $gambar = upd_picture($request->gambar, $profil->gambar, 'profil/');

                    $profil->gambar = $gambar;
                }

                $profil->nama      = $request->nama;
                $profil->slug      = Str::slug($request->nama, '-');
                $profil->deskripsi = $request->deskripsi;
                $profil->by_users  = $this->session->id;
                $profil->save();
            }

            $response = ['title' => 'Berhasil!', 'text' => 'Data Sukses di Simpan!', 'type' => 'success', 'button' => 'Okay!', 'class' => 'success'];
        } catch (\Exception $e) {
            $response = ['title' => 'Gagal!', 'text' => 'Data Gagal di Simpan!', 'type' => 'error', 'button' => 'Okay!', 'class' => 'danger'];
        }

        return Response::json($response);
    }

    public function del(Request $request)
    {
        $checking = is_valid_user($this->session->id, $request->password);
        if ($checking) {
            try {
                $data = Profil::find(my_decrypt($request->id));

                del_picture($data->gambar, 'profil/');

                $data->delete();

                $response = ['title' => 'Berhasil!', 'text' => 'Data Sukses di Hapus!', 'type' => 'success', 'button' => 'Ok!', 'class' => 'success'];
            } catch (\Exception $e) {
                $response = ['title' => 'Gagal!', 'text' => 'Data Gagal di Hapus!', 'type' => 'error', 'button' => 'Ok!', 'class' => 'danger'];
            }
        } else {
            $response = ['title' => 'Maaf!', 'text' => 'Password Anda Salah!', 'type' => 'warning', 'button' => 'Ok!', 'class' => 'warning'];
        }
        return Response::json($response);
    }
}