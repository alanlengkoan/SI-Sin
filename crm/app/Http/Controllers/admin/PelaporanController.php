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

    public function det($id)
    {
        $id = my_decrypt($id);

        $pelaporan = Pelaporan::with(['toAgen', 'toPetambak'])->findOrFail($id);

        $data = [
            'pelaporan' => $pelaporan
        ];

        return Template::load('admin', 'Detail', 'pelaporan', 'det', $data);
    }

    public function get_data_dt()
    {
        $data = Pelaporan::latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function ($row) {
                return '
                    <a href="' . route('admin.pelaporan.det', ['id' => my_encrypt($row->id_pelaporan)]) . '" class="btn btn-sm btn-relief-info"><i data-feather="info"></i>&nbsp;Detail</a>&nbsp;
                ';
            })
            ->make(true);
    }
}
