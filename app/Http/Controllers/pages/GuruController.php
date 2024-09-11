<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Guru;
use Illuminate\Http\Request;

class GuruController extends Controller
{
    public function index()
    {
        $data = [
          'gurus' => Guru::all()
        ];

        return Template::pages('Guru', 'guru', 'view', $data);
    }

    public function detail(Request $request)  {
        $id = my_decrypt($request->id);

        $data = [
            'guru' => Guru::find($id)
        ];

        return Template::pages('Detail', 'guru', 'detail', $data);
    }
}
