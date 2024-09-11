<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Profil;
use Illuminate\Http\Request;

class ProfilController extends Controller
{
    public function index(Request $request)
    {
        $slug = $request->slug;

        $profil = Profil::whereSlug($slug)->firstOrFail();
        
        $data = [
            'profil' => $profil
        ];

        return Template::pages(ucfirst($slug), 'profil', 'view', $data);
    }
}
