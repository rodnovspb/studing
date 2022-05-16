<?php

namespace App\Http\Controllers;

use App\Models\Worker;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function show(){
        $worker = Worker::find(1);
        dump($worker->position);
        dump($worker->region);
    }
}
