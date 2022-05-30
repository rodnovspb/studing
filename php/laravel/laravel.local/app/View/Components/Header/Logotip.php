<?php

namespace App\View\Components\Header;

use Illuminate\View\Component;

class Logotip extends Component
{
    public $alt;
    public function __construct($alt)
    {
        $this->alt = $alt;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.header.logotip');
    }
}
