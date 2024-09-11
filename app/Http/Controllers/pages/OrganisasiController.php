<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Organisasi;

class OrganisasiController extends Controller
{
    public function index()
    {
        $data = [
            'organisasis' => Organisasi::active()->get()
        ];

        return Template::pages('Organisasi', 'organisasi', 'view', $data);
    }
}
