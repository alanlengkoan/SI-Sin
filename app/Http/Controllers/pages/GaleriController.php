<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Galeri;

class GaleriController extends Controller
{
    public function foto()
    {
        $fotos = Galeri::where('jenis', '=', 'foto')->active()->get();

        $data = [
            'fotos' => $fotos
        ];

        return Template::pages('Foto', 'galeri/foto', 'view', $data);
    }

    public function video()
    {
        $videos = Galeri::where('jenis', '!=', 'foto')->active()->get();

        $data = [
            'videos' => $videos
        ];

        return Template::pages('Video', 'galeri/video', 'view', $data);
    }
}
