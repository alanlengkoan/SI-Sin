<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Petambak;
use Yajra\DataTables\Facades\DataTables;

class PetambakController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        return Template::load('admin', 'Petambak', 'petambak', 'view');
    }

    public function get_data_dt()
    {
        $data = Petambak::latest()->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->make(true);
    }
}
