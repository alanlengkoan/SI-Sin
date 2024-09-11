<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GuruRequest;
use App\Libraries\Template;
use App\Models\Agama;
use App\Models\Guru;
use App\Models\Jabatan;
use App\Models\Matpel;
use App\Models\Pendidikan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;

class GuruController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        // for checking permission
        $this->middleware('permission:guru-read', ['only' => ['index']]);
    }

    public function index()
    {
        $data = [
            'agamas'      => Agama::all(),
            'matpels'     => Matpel::all(),
            'jabatans'    => Jabatan::all(),
            'pendidikans' => Pendidikan::all(),
        ];

        return Template::load('admin', 'Guru', 'guru', 'view', $data);
    }

    public function get_data_dt()
    {
        $data = Guru::latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('tgl_lahir', function ($row) {
                return tgl_indo($row->tgl_lahir);
            })
            ->addColumn('kelamin', function ($row) {
                return $row->kelamin == 'l' ? 'Laki-laki' : 'Perempuan';
            })
            ->addColumn('foto', function ($row) {
                return '<img src="' . asset_upload('picture/guru/' . $row->foto) . '" class="img-fluid" width="100px">';
            })
            ->addColumn('action', function ($row) {
                return '
                    <button type="button" id="upd" data-id="' . my_encrypt($row->id_guru) . '" class="btn btn-sm btn-action btn-relief-primary" data-bs-toggle="modal" data-bs-target="#modal-add-upd"><i data-feather="edit"></i>&nbsp;<span>Ubah</span></button>&nbsp;
                    <button type="button" id="del" data-id="' . my_encrypt($row->id_guru) . '" class="btn btn-sm btn-action btn-relief-danger"><i data-feather="trash"></i>&nbsp;<span>Hapus</span></button>
                ';
            })
            ->rawColumns(['foto', 'action'])
            ->make(true);
    }

    public function show(Request $request)
    {
        $response = Guru::find(my_decrypt($request->id));

        return Response::json($response);
    }

    public function save(GuruRequest $request)
    {
        try {
            if ($request->id_guru === null) {
                $foto = add_picture($request->foto, 'guru/');

                $guru                = new Guru();
                $guru->id_agama      = $request->id_agama;
                $guru->id_matpel     = $request->id_matpel;
                $guru->id_jabatan    = $request->id_jabatan;
                $guru->id_pendidikan = $request->id_pendidikan;
                $guru->nip           = $request->nip;
                $guru->nama          = $request->nama;
                $guru->kelamin       = $request->kelamin;
                $guru->tgl_lahir     = $request->tgl_lahir;
                $guru->tmp_lahir     = $request->tmp_lahir;
                $guru->alamat        = $request->alamat;
                $guru->foto          = $foto;
                $guru->facebook      = $request->facebook;
                $guru->instagram     = $request->instagram;
                $guru->by_users      = $this->session->id;
                $guru->save();
            } else {
                $guru = Guru::find($request->id_guru);

                if (isset($request->change_picture) && $request->change_picture === 'on') {
                    $foto = upd_picture($request->foto, $guru->foto, 'guru/');

                    $guru->foto = $foto;
                }

                $guru->id_agama      = $request->id_agama;
                $guru->id_matpel     = $request->id_matpel;
                $guru->id_jabatan    = $request->id_jabatan;
                $guru->id_pendidikan = $request->id_pendidikan;
                $guru->nip           = $request->nip;
                $guru->nama          = $request->nama;
                $guru->kelamin       = $request->kelamin;
                $guru->tgl_lahir     = $request->tgl_lahir;
                $guru->tmp_lahir     = $request->tmp_lahir;
                $guru->alamat        = $request->alamat;
                $guru->facebook      = $request->facebook;
                $guru->instagram     = $request->instagram;
                $guru->by_users      = $this->session->id;
                $guru->save();
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
                $data = Guru::find(my_decrypt($request->id));

                del_picture($data->foto, 'guru/');

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
