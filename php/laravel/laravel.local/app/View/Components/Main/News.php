<?php

namespace App\View\Components\Main;

use Illuminate\View\Component;

class News extends Component
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
        return view('components.main.news' , [
            'var1'=> 'Эта информация подтянется из компонента',
        ]);
    }
}
