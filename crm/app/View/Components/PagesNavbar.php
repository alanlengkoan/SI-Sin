<?php

namespace App\View\Components;

use App\Models\Kategori;
use App\Models\Medsos;
use App\Models\Pengaturan;
use App\Models\Profil;
use Illuminate\View\Component;

class PagesNavbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('pages.components.pages-navbar');
    }
}
