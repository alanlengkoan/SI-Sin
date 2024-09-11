<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use App\Libraries\Template;
use App\Models\Marketing;

class HomeController extends Controller
{
    public $marketing;

    public function __construct()
    {
        parent::__construct();

        $this->marketing = Marketing::all();
    }

    public function index()
    {
        return Template::pages('Home', 'home', 'view');
    }

    public function agen()
    {
        $data = [
            'marketing' => $this->marketing,
        ];

        return Template::pages('Agen', 'home', 'agen', $data);
    }

    public function petambak()
    {
        $data = [
            'marketing' => $this->marketing,
        ];

        return Template::pages('Petambak', 'home', 'petambak', $data);
    }

    public function store()
    {
        // 
    }
}
