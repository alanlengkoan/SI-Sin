<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Visitor;
use Yajra\DataTables\DataTables;

class VisitorController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        // for checking permission
        $this->middleware('permission:visitor-read', ['only' => ['index']]);
    }

    public function index()
    {
        return Template::load('admin', 'Visitor', 'visitor', 'view');
    }

    public function get_data_dt()
    {
        $data = Visitor::latest('id_visitor')->get();

        return DataTables::of($data)
            ->addIndexColumn()
            ->addColumn('created_at', function ($row) {
                return sql_datetime($row->created_at);
            })
            ->make(true);
    }
}
