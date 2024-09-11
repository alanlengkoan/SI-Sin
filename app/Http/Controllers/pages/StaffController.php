<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index()
    {
        $data = [
            'staffs' => Staff::all()
        ];

        return Template::pages('Staff', 'staff', 'view', $data);
    }

    public function detail(Request $request)
    {
        $id = my_decrypt($request->id);

        $data = [
            'staff' => Staff::find($id)
        ];

        return Template::pages('Detail', 'staff', 'detail', $data);
    }
}
