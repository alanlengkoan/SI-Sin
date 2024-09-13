<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Agen;
use Yajra\DataTables\Facades\DataTables;

class AgenController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return Template::load('admin', 'Agen', 'agen', 'view');
    }

    public function get_data_dt()
    {
        $data = Agen::latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->make(true);
    }
}
