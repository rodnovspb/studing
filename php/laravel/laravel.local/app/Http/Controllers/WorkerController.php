<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function show(){
        $worker = Worker::all();

        foreach ($worker as $key=>$value){
            dump($key);
            dump($value);
        }
//        dump($worker->position);
//        dump($worker->region);
    }
}
