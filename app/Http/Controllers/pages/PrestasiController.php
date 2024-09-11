<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Prestasi;

class PrestasiController extends Controller
{
    public function index()
    {
        $data = [
            'prestasis' => Prestasi::active()->get()
        ];

        return Template::pages('Prestasi', 'prestasi', 'view', $data);
    }
}
