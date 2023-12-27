<?php

namespace EvolutionCMS\Main\Controllers;

use EvolutionCMS\Main\Models\File;
use EvolutionCMS\Main\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MainController extends BaseController
{

  public function create_order(Request $request, Order $obj, File $file){

    /*Проверка, что пришло в общем не более 20 мб файлов*/
    if($request->hasFile('files')) {
      $totalSize = 0;
      foreach($request->file('files') as $fileItem) {
        $totalSize += $fileItem->getSize();
      }
      if($totalSize > 20971520) { // 20 MB in bytes
        return redirect()->back();
      }
    }

    $data = $request->all();

    /*Следующие проверки полей*/
    $validator = validator()->make($data, $obj->rules);

    if ($validator->fails()) {
      return redirect()->back()->withInput()->withErrors($validator);
    }


    /*Если данные провалидированы сначала сохраняем файлы*/
    $files = $file->storeFiles($request);

    unset($data['files']);

    /*Затем создаем создаем запись заказа и записи прикрепленных файлов*/
    $result = DB::transaction(function() use ($data, $files, $file){
      $order = Order::query()->create($data);
      $file->insertFiles($files, $order->id);
      return $order;
    }, 2);

    if($result){
      return redirect('success');
    }

  }

  public function checkCaptcha(Request $request){
      // Задаем параметры
      $recaptcha_url = 'https://www.google.com/recaptcha/api/siteverify';
      $recaptcha_secret = evo()->getConfig('recaptcha_secret');
      $code = $request->code;

      // Обрабатываем параметры
      $recaptcha = file_get_contents($recaptcha_url . '?secret=' . $recaptcha_secret . '&response=' . $code);
      $recaptcha = json_decode($recaptcha);

      return $recaptcha->score;
    }


}
