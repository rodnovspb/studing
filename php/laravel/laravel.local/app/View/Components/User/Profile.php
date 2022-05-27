<?php

namespace App\View\Components\User;

use Illuminate\View\Component;

class Profile extends Component
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
        return view('components.user.profile', [
            'name'=>'Денис',
            'surname'=>'Роднов',
            'age'=>35,
        ]);
    }
}
