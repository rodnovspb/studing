<?php

namespace App\Http\Controllers;



use App\Models\Product;
use App\Models\User;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;


use Memcache;

use function Illuminate\Events\queueable;


class MainController extends Controller
{

    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function index()
    {

        $obj = null;

        dd(is_null($obj) ? null :  $obj->var);

        dd(optional($obj)->df);

        return view('pages.index');
    }













}
