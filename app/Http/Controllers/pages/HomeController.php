<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Guru;
use App\Models\Kategori;

class HomeController extends Controller
{
    public function index()
    {
        $gurus     = Guru::limit(3)->latest()->get();
        $informasi = Kategori::with(['toInformasi'])->get();

        $data = [
            'gurus'     => $gurus,
            'informasi' => $informasi,
        ];

        return Template::pages('Home', 'home', 'view', $data);
    }

    public function kontak()
    {
        return Template::pages('Kontak', 'home', 'kontak');
    }

    public function tentang()
    {
        return Template::pages('Tentang', 'home', 'tentang');
    }
}
