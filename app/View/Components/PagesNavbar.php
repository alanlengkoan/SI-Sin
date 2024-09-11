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
    public $kategori;
    public $profil;
    public $medsos;
    public $pengaturan;

    public function __construct()
    {
        $this->kategori   = Kategori::all();
        $this->profil     = Profil::all();
        $this->medsos     = Medsos::all();
        $this->pengaturan = Pengaturan::all()->keyBy('key')->toArray();
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
