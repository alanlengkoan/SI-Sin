<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\InformasiRequest;
use App\Libraries\Template;
use App\Models\Informasi;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;

class InformasiController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        // for checking permission
        $this->middleware('permission:informasi-read', ['only' => ['index']]);
    }

    public function index()
    {
        $data = [
            'kategoris' => Kategori::all(),
        ];

        return Template::load('admin', 'Informasi', 'informasi', 'view', $data);
    }

    public function get_data_dt()
    {
        $data = Informasi::latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('gambar', function ($row) {
                return '<img src="' . asset_upload('picture/informasi/' . $row->gambar) . '" class="img-fluid" width="100px">';
            })
            ->addColumn('isi', function ($row) {
                return $row->isi;
            })
            ->addColumn('status', function ($row) {
                $status = ($row->status == '1') ? '<i data-feather="check"></i>&nbsp;<span>Aktif</span>' : '<i data-feather="x"></i>&nbsp;<span>Tidak Aktif</span>';
                $button = ($row->status == '1') ? 'btn-relief-success' : 'btn-relief-danger';

                return '
                    <button type="button" id="sts" data-id="' . my_encrypt($row->id_informasi) . '" class="btn btn-sm ' . $button . '">' . $status . '</button>
                ';
            })
            ->addColumn('action', function ($row) {
                return '
                    <button type="button" id="upd" data-id="' . my_encrypt($row->id_informasi) . '" class="btn btn-sm btn-action btn-relief-primary" data-bs-toggle="modal" data-bs-target="#modal-add-upd"><i data-feather="edit"></i>&nbsp;<span>Ubah</span></button>&nbsp;
                    <button type="button" id="del" data-id="' . my_encrypt($row->id_informasi) . '" class="btn btn-sm btn-action btn-relief-danger"><i data-feather="trash"></i>&nbsp;<span>Hapus</span></button>
                ';
            })
            ->rawColumns(['gambar', 'isi', 'status', 'action'])
            ->make(true);
    }

    public function show(Request $request)
    {
        $response = Informasi::find(my_decrypt($request->id));

        return Response::json($response);
    }

    public function save(InformasiRequest $request)
    {
        try {
            if ($request->id_informasi === null) {
                $gambar = add_picture($request->gambar, 'informasi/');

                $informasi              = new Informasi();
                $informasi->id_kategori = $request->id_kategori;
                $informasi->judul       = $request->judul;
                $informasi->isi         = $request->isi;
                $informasi->gambar      = $gambar;
                $informasi->status      = '1';
                $informasi->by_users    = $this->session->id;
                $informasi->save();
            } else {
                $informasi = Informasi::find($request->id_informasi);

                if (isset($request->change_picture) && $request->change_picture === 'on') {
                    $gambar = upd_picture($request->gambar, $informasi->gambar, 'informasi/');

                    $informasi->gambar = $gambar;
                }

                $informasi->id_kategori = $request->id_kategori;
                $informasi->judul       = $request->judul;
                $informasi->isi         = $request->isi;
                $informasi->by_users    = $this->session->id;
                $informasi->save();
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
                $data = Informasi::find(my_decrypt($request->id));

                del_picture($data->gambar, 'informasi/');

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
                $data = Informasi::find(my_decrypt($request->id));
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
