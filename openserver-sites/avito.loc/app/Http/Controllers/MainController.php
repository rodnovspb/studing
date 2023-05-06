<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\MyClasses\MyClass;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Gate;


class MainController extends Controller
{
    const USER_ROLE = 'admin';

    public function index()
    {
        Gate::allowIf(fn (User $user) => $user->name === 'asdasd');
        return view('pages.index' );
    }

}
