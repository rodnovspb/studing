<?php
namespace App\View\Components\User;

use Illuminate\View\Component;

class Info extends Component
{
    public function render(){
        return view('components.user.info', [
            'arr'=>['строка 1', 'строка 2', 'строка 3', 'строка 4'],
        ]);
    }

}
