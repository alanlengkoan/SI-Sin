<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Informasi;
use App\Models\Kategori;
use Illuminate\Http\Request;

class InformasiController extends Controller
{
    public function index(Request $request)
    {
        $slug   = $request->slug;
        $query  = Kategori::with([
            'toInformasi' => function ($query) use ($slug) {
                $query->active()->orderBy('created_at', 'desc');
            }
        ])->where('slug', $slug)->firstOrFail()->toInformasi;

        $result = paginate($query, 6);
        $result->setPath($slug);

        $data = [
            'informasi' => $result
        ];

        return Template::pages(ucfirst($slug), 'informasi', 'view', $data);
    }

    public function detail($slug, $id)
    {
        $id = my_decrypt($id);

        $informasi = Informasi::findOrFail($id);
        $informasi->increment('dilihat');

        $data = [
            'informasi' => $informasi
        ];

        return Template::pages('Detail', 'informasi', 'detail', $data);
    }
}
