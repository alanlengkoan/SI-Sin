<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GaleriRequest;
use App\Libraries\Template;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;

class GaleriController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        // for checking permission
        $this->middleware('permission:galeri-read', ['only' => ['index']]);
    }

    public function index()
    {
        return Template::load('admin', 'Galeri', 'galeri', 'view');
    }

    public function get_data_dt()
    {
        $data = Galeri::latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('file_url', function ($row) {
                if ($row->jenis === 'url') {
                    return '<iframe width="50%" height="315" src="https://www.youtube.com/embed/' . $row->url . '"></iframe>';
                } else if ($row->jenis === 'foto') {
                    return '<img width="50%" src="' . asset_upload('picture/galeri/' . $row->file) . '">';
                } else if ($row->jenis === 'video') {
                    return '<video width="50%" controls controlsList="nodownload"><source src="' . asset_upload('video/galeri/' . $row->file) . '" type="video/mp4"></video>';
                }
            })
            ->addColumn('status', function ($row) {
                $status = ($row->status == '1') ? '<i data-feather="check"></i>&nbsp;<span>Aktif</span>' : '<i data-feather="x"></i>&nbsp;<span>Tidak Aktif</span>';
                $button = ($row->status == '1') ? 'btn-relief-success' : 'btn-relief-danger';

                return '
                    <button type="button" id="sts" data-id="' . my_encrypt($row->id_galeri) . '" class="btn btn-sm ' . $button . '">' . $status . '</button>
                ';
            })
            ->addColumn('action', function ($row) {
                return '
                    <button type="button" id="upd" data-id="' . my_encrypt($row->id_galeri) . '" class="btn btn-sm btn-relief-primary" data-bs-toggle="modal" data-bs-target="#modal-add-upd"><i data-feather="edit"></i>&nbsp;<span>Ubah</span></button>&nbsp;
                    <button type="button" id="del" data-id="' . my_encrypt($row->id_galeri) . '" class="btn btn-sm btn-relief-danger"><i data-feather="trash"></i>&nbsp;<span>Hapus</span></button>
                ';
            })
            ->rawColumns(['file_url', 'status', 'action'])
            ->make(true);
    }

    public function show(Request $request)
    {
        $response = Galeri::find(my_decrypt($request->id));

        return Response::json($response);
    }

    public function save(GaleriRequest $request)
    {
        try {
            if ($request->id_galeri === null) {
                $galeri        = new Galeri();
                $galeri->jenis = $request->jenis;

                if ($request->jenis === 'url') {
                    $galeri->url = $request->url;
                } else if ($request->jenis === 'foto') {
                    $file         = add_picture($request->file, 'galeri/');
                    $galeri->file = $file;
                } else if ($request->jenis === 'video') {
                    $file         = add_video($request->file, 'galeri/');
                    $galeri->file = $file;
                }

                $galeri->status   = '1';
                $galeri->by_users = $this->session->id;
                $galeri->save();
            } else {
                $galeri        = Galeri::find($request->id_galeri);
                $galeri->jenis = $request->jenis;

                if ($request->jenis === 'url') {
                    $galeri->url = $request->url;
                } else if ($request->jenis === 'foto') {
                    if (isset($request->change_picture) && $request->change_picture === 'on') {
                        $file         = upd_picture($request->file, $galeri->file, 'galeri/');
                        $galeri->file = $file;
                    }
                } else if ($request->jenis === 'video') {
                    if (isset($request->change_picture) && $request->change_picture === 'on') {
                        $file         = upd_video($request->file, $galeri->file, 'galeri/');
                        $galeri->file = $file;
                    }
                }

                $galeri->by_users = $this->session->id;
                $galeri->save();
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
                $data = Galeri::find(my_decrypt($request->id));

                if ($data->jenis === 'foto') {
                    del_picture($data->file, 'galeri/');
                } else if ($data->jenis === 'video') {
                    del_video($data->file, 'galeri/');
                }

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

    public function status(Request $request)
    {
        $checking = is_valid_user($this->session->id, $request->password);
        if ($checking) {
            try {
                $data = Galeri::find(my_decrypt($request->id));
                $data->status = ($data->status == '1') ? '0' : '1';
                $data->save();

                $response = ['title' => 'Berhasil!', 'text' => 'Data Sukses di Ubah!', 'type' => 'success', 'button' => 'Ok!', 'class' => 'success'];
            } catch (\Exception $e) {
                $response = ['title' => 'Gagal!', 'text' => 'Data Gagal di Ubah!', 'type' => 'error', 'button' => 'Ok!', 'class' => 'danger'];
            }
        } else {
            $response = ['title' => 'Maaf!', 'text' => 'Password Anda Salah!', 'type' => 'warning', 'button' => 'Ok!', 'class' => 'warning'];
        }
        return Response::json($response);
    }
}
