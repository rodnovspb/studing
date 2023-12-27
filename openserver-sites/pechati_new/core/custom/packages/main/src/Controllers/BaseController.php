<?php
namespace EvolutionCMS\Main\Controllers;

use EvolutionCMS\Main\Models\Page;
use Illuminate\Support\Facades\Cache;

class BaseController
{
  // в эту переменную добавляйте данные,
  // которые хотите отдать в шаблоны
  public $data = [];

  public function __construct()
  {
    // подключаем функции CMS
    $this->evo = EvolutionCMS();

    ksort($_GET);

    $cacheid = md5(json_encode($_GET));
    // если включен кэш на сайте,
    // получаем данные из кэша
    // rememberForever - метод Laravel, см. документацию
    if ($this->evo->getConfig('enable_cache')) {
      $this->data = Cache::rememberForever($cacheid, function () {
        $this->globalElements();
        $this->render();
        return $this->data;
      });
    } else {
      $this->globalElements();
      $this->render();
    }
    $this->noCacheRender();
    $this->sendToView();
  }
  public function render()
  {
    // использовать для отдачи данных
  }

  public function noCacheRender()
  {
    // использовать для отдачи некэшированных данных
  }

  public function globalElements()
  {
    /*создание верхних меню*/
    $menuPageIds = explode('||', evo()->getConfig('client_menu'));
    $subMenuPageIds = explode('||', evo()->getConfig('client_submenu'));

    $menuPages = Page::query()->orderBy('menuindex', 'asc')->find($menuPageIds)->pluck('menutitle', 'id');
    $subMenuPages = Page::query()->orderBy('menuindex', 'asc')->find($subMenuPageIds)->pluck('menutitle', 'id');

    $this->data['menu'] = $menuPages;
    $this->data['submenu'] = $subMenuPages;
  }

  public function sendToView()
  {
    // отдаём данные в шаблон
    $this->evo->addDataToView($this->data);
  }

  //извлечение мультитв из json
  public function getMultiTv($value) {
    $value = json_decode($value, true) ?? [];
    return $value['fieldValue'] ?? [];

  }

  public function getPageData(){

    $page = Page::find($this->evo->documentObject['id']);

    //если на странице заполнены ТВ "срочность"
    if(isset($this->evo->documentObject['urgency'][1])){
      $this->data['urgency'] = $this->getMultiTv($this->evo->documentObject['urgency'][1]);
    }

    //если заполнены типы доставки
    if($this->evo->getConfig('client_delivery')){
      $this->data['deliveries'] = json_decode($this->evo->getConfig('client_delivery'), true);
    }

    //если заполнены макеты
    if(isset($this->evo->documentObject['templates'][1])){
      $this->data['templates'] = $this->getMultiTv($this->evo->documentObject['templates'][1]);
    }

    //если на страницу прикрепили оснастки и другие товары
    $cases = $page->cases()->orderBy('order')->get();
    $products = $page->products()->orderBy('order')->get();

    if($cases->isNotEmpty()){
      $this->data['cases'] = $cases;
    }
    if($products->isNotEmpty()){
      $this->data['products'] = $products;
    }

  }

}
