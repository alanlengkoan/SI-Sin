<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Pelaporan;
use Yajra\DataTables\Facades\DataTables;

class PelaporanController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return Template::load('admin', 'Pelaporan', 'pelaporan', 'view');
    }

    public function get_data_dt()
    {
        $data = Pelaporan::latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '
                    <button type="button" id="upd" data-id="' . my_encrypt($row->id_pelaporan) . '" class="btn btn-sm btn-relief-primary" data-bs-toggle="modal" data-bs-target="#modal-add-upd"><i data-feather="edit"></i>&nbsp;<span>Ubah</span></button>&nbsp;
                    <button type="button" id="del" data-id="' . my_encrypt($row->id_pelaporan) . '" class="btn btn-sm btn-relief-danger"><i data-feather="trash"></i>&nbsp;<span>Hapus</span></button>
                ';
            })
            ->make(true);
    }
}
