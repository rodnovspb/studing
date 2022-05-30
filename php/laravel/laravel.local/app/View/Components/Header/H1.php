<?php

namespace App\View\Components\Header;

use Illuminate\View\Component;

class H1 extends Component
{
    public $h1;
    public function __construct($h1)
    {
        $this->h1 = $h1;
    }


    public function render()
    {
        return view('components.header.h1' , [
            'h1' => $this->h1
        ]);
    }
}
