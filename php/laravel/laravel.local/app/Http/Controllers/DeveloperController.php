<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Developer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\LoginController;

class DeveloperController extends Controller
{
    public function all(Request $request){
        if(isset($_GET['del'])){
            Developer::where('id', $_GET['del'])->delete();
              $url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
//            $url = explode('?', $_SERVER['REQUEST_URI'])[0];
            header("Location: $url");
            exit();
        } elseif($request->has('name') and $request->has('surname')  and $request->has('hidden')) {
            $name = $request->input('name');
            $surname = $request->input('surname');
            $id = $request->input('hidden');
            $page = $request->input('page');
            $developer = Developer::where('id', '=', $id)->first();
            $developer->name = $name;
            $developer->surname = $surname;
            $developer->save();
            header("Location: $page");
            exit();
        }
        $developers =  Developer::simplePaginate(15);
        return view('developer.all', ['all'=>$developers]);
    }

    public function form(Request $request){
        if($request->has('name') and $request->has('surname')){
            $name = $request->input('name');
            $surname = $request->input('surname');
            $developer = new Developer;
            $developer->name = $name;
            $developer->surname = $surname;
            $developer->save();
        }
        return view('developer.form');
    }

    public function edit($id){
        $developer = Developer::where('id', $id)->first();
        $name = $developer->name;
        $surname = $developer->surname;
        // с какой страницы пользователь пришел на редактирование (т.к. пагинация)
        $page = $_SERVER['HTTP_REFERER'];
        return view('developer.edit', ['id'=>$id, 'name'=>$name, 'surname'=>$surname, 'page'=>$page]);
    }

    public function url(Request $request){
            $developer =  Developer::find(35);
//            echo URL::current();
//            echo route('developer.url', ['developer' => $developer]);
    }

    public function unsubscribe(Request $request){
        $url = action([LoginController::class, 'tasks']);
        echo $url;

        $developer =  Developer::find(35);
//        echo URL::signedRoute('unsubscribe', ['developer' => $developer]);
//        echo URL::temporarySignedRoute('unsubscribe', now()->addMinutes(30), ['developer' => $developer]);
//          if(!$request->hasValidSignature()){
//              abort(401);
//          }
//            if(!$request->hasValidSignatureWhileIgnoring(['page', 'order'])){
//                 abort(401);
//          }

    }
}
