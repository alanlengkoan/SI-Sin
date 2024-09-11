<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StaffRequest;
use App\Libraries\Template;
use App\Models\Agama;
use App\Models\Jabatan;
use App\Models\Pendidikan;
use App\Models\Staff;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Yajra\DataTables\Facades\DataTables;

class StaffController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        // for checking permission
        $this->middleware('permission:staff-read', ['only' => ['index']]);
    }

    public function index()
    {
        $data = [
            'agamas'      => Agama::all(),
            'jabatans'    => Jabatan::all(),
            'pendidikans' => Pendidikan::all(),
        ];

        return Template::load('admin', 'Staff', 'staff', 'view', $data);
    }

    public function get_data_dt()
    {
        $data = Staff::latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('tgl_lahir', function ($row) {
                return tgl_indo($row->tgl_lahir);
            })
            ->addColumn('kelamin', function ($row) {
                return $row->kelamin == 'l' ? 'Laki-laki' : 'Perempuan';
            })
            ->addColumn('foto', function ($row) {
                return '<img src="' . asset_upload('picture/staff/' . $row->foto) . '" class="img-fluid" width="100px">';
            })
            ->addColumn('action', function ($row) {
                return '
                    <button type="button" id="upd" data-id="' . my_encrypt($row->id_staff) . '" class="btn btn-sm btn-action btn-relief-primary" data-bs-toggle="modal" data-bs-target="#modal-add-upd"><i data-feather="edit"></i>&nbsp;<span>Ubah</span></button>&nbsp;
                    <button type="button" id="del" data-id="' . my_encrypt($row->id_staff) . '" class="btn btn-sm btn-action btn-relief-danger"><i data-feather="trash"></i>&nbsp;<span>Hapus</span></button>
                ';
            })
            ->rawColumns(['foto', 'action'])
            ->make(true);
    }

    public function show(Request $request)
    {
        $response = Staff::find(my_decrypt($request->id));

        return Response::json($response);
    }

    public function save(StaffRequest $request)
    {
        try {
            if ($request->id_staff === null) {
                $foto = add_picture($request->foto, 'staff/');

                $staff                = new Staff();
                $staff->id_agama      = $request->id_agama;
                $staff->id_jabatan    = $request->id_jabatan;
                $staff->id_pendidikan = $request->id_pendidikan;
                $staff->nama          = $request->nama;
                $staff->kelamin       = $request->kelamin;
                $staff->tgl_lahir     = $request->tgl_lahir;
                $staff->tmp_lahir     = $request->tmp_lahir;
                $staff->alamat        = $request->alamat;
                $staff->foto          = $foto;
                $staff->facebook      = $request->facebook;
                $staff->instagram     = $request->instagram;
                $staff->by_users      = $this->session->id;
                $staff->save();
            } else {
                $staff = Staff::find($request->id_staff);

                if (isset($request->change_picture) && $request->change_picture === 'on') {
                    $foto = upd_picture($request->foto, $staff->foto, 'staff/');

                    $staff->foto = $foto;
                }

                $staff->id_agama      = $request->id_agama;
                $staff->id_jabatan    = $request->id_jabatan;
                $staff->id_pendidikan = $request->id_pendidikan;
                $staff->nama          = $request->nama;
                $staff->kelamin       = $request->kelamin;
                $staff->tgl_lahir     = $request->tgl_lahir;
                $staff->tmp_lahir     = $request->tmp_lahir;
                $staff->alamat        = $request->alamat;
                $staff->facebook      = $request->facebook;
                $staff->instagram     = $request->instagram;
                $staff->by_users      = $this->session->id;
                $staff->save();
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
                $data = Staff::find(my_decrypt($request->id));

                del_picture($data->foto, 'staff/');

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
