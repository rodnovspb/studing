<?php

namespace EvolutionCMS\Main\Controllers;

use EvolutionCMS\Main\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Validator;


class MainController extends BaseController
{

  public $errors = [];

  public function set_errors(): void {
   $params = func_get_args();

   foreach ($params as $param){
     if($param instanceof Validator){
       $this->errors = array_merge($param->errors()->messages(), $this->errors);
     } else if(is_array($param)){
       $this->errors = array_merge($param, $this->errors);
     }
   }
   if(!empty($this->errors)){
     $_SESSION['errors'] = $this->errors;

   }

  }

  public function create_order(Request $request, Order $obj){
    /*Проверка, что пришло в общем не более 20 мб файлов*/
    if($request->hasFile('files')) {
      $totalSize = 0;
      foreach($request->file('files') as $file) {
        $totalSize += $file->getSize();
      }
      if($totalSize > 10971520) { // 20 MB in bytes
        $this->set_errors(['files' => ['Общий размер файлов не более 20 МБ']]);
      }
    }

    $data = $request->all();

    /*Следующие проверки полей*/
    $validator = validator()->make($data, $obj->rules);

    if ($validator->fails()) {
      $this->set_errors($validator);
      return redirect()->back()->withInput()->withErrors($validator);
    }

    return redirect()->back();


    dd($data);

    $pages = $data['pages'] ?? [];

    $result = DB::transaction(function () use ($pages, $data){
      //почистить от атак или узнать проверяется ли
      $case = Order::query()->create($data);

      return $case;
    });

    if($result) {
      return redirect()->route('cases::index')->with('success', 'Оснастка добавлена');
    } else {
      return redirect()->back()->with('error', 'Ошибка добавления');
    }
}

  public function qqq(){
    return view('layouts.my');
  }

}
