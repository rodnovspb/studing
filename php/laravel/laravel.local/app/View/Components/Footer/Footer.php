<?php

namespace App\View\Components\Footer;

use Illuminate\View\Component;

class Footer extends Component
{
    public function render(){
//        return 'выведено через компонент';
        return view('components.footer.footer');
    }

}
