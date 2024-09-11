<?php

namespace App\View\Components;

use App\Models\Medsos;
use App\Models\Pengaturan;
use Illuminate\View\Component;

class PagesFooter extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $medsos;
    public $pengaturan;

    public function __construct()
    {
        $this->medsos = Medsos::all();

        $this->pengaturan = Pengaturan::all()->keyBy('key')->toArray();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('pages.components.pages-footer');
    }
}
