<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Fasilitas;

class FasilitasController extends Controller
{
    public function index()
    {
        $data = [
            'fasilitas' => Fasilitas::active()->get()
        ];

        return Template::pages('Fasilitas', 'fasilitas', 'view', $data);
    }
}
