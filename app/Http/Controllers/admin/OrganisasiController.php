<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\OrganisasiRequest;
use App\Libraries\Template;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;

class OrganisasiController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        // for checking permission
        $this->middleware('permission:organisasi-read', ['only' => ['index']]);
    }

    public function index()
    {
        return Template::load('admin', 'Organisasi', 'organisasi', 'view');
    }

    public function get_data_dt()
    {
        $data = Organisasi::latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('gambar', function ($row) {
                return '<img src="' . asset_upload('picture/organisasi/' . $row->gambar) . '" class="img-fluid" width="100px">';
            })
            ->addColumn('deskripsi', function ($row) {
                return $row->deskripsi;
            })
            ->addColumn('status', function ($row) {
                $status = ($row->status == '1') ? '<i data-feather="check"></i>&nbsp;<span>Aktif</span>' : '<i data-feather="x"></i>&nbsp;<span>Tidak Aktif</span>';
                $button = ($row->status == '1') ? 'btn-relief-success' : 'btn-relief-danger';

                return '
                    <button type="button" id="sts" data-id="' . my_encrypt($row->id_organisasi) . '" class="btn btn-sm ' . $button . '">' . $status . '</button>
                ';
            })
            ->addColumn('action', function ($row) {
                return '
                    <button type="button" id="upd" data-id="' . my_encrypt($row->id_organisasi) . '" class="btn btn-sm btn-action btn-relief-primary" data-bs-toggle="modal" data-bs-target="#modal-add-upd"><i data-feather="edit"></i>&nbsp;<span>Ubah</span></button>&nbsp;
                    <button type="button" id="del" data-id="' . my_encrypt($row->id_organisasi) . '" class="btn btn-sm btn-action btn-relief-danger"><i data-feather="trash"></i>&nbsp;<span>Hapus</span></button>
                ';
            })
            ->rawColumns(['gambar', 'deskripsi', 'status', 'action'])
            ->make(true);
    }

    public function show(Request $request)
    {
        $response = Organisasi::find(my_decrypt($request->id));

        return Response::json($response);
    }

    public function save(OrganisasiRequest $request)
    {
        try {
            if ($request->id_organisasi === null) {
                $gambar = add_picture($request->gambar, 'organisasi/');

                $organisasi            = new Organisasi();
                $organisasi->nama      = $request->nama;
                $organisasi->deskripsi = $request->deskripsi;
                $organisasi->gambar    = $gambar;
                $organisasi->status    = '1';
                $organisasi->by_users  = $this->session->id;
                $organisasi->save();
            } else {
                $organisasi = Organisasi::find($request->id_organisasi);

                if (isset($request->change_picture) && $request->change_picture === 'on') {
                    $gambar = upd_picture($request->gambar, $organisasi->gambar, 'organisasi/');

                    $organisasi->gambar = $gambar;
                }

                $organisasi->nama      = $request->nama;
                $organisasi->deskripsi = $request->deskripsi;
                $organisasi->by_users  = $this->session->id;
                $organisasi->save();
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
                $data = Organisasi::find(my_decrypt($request->id));

                del_picture($data->gambar, 'organisasi/');

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
                $data = Organisasi::find(my_decrypt($request->id));
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
