<?php

namespace EvolutionCMS\Main\Controllers;

use EvolutionCMS\Facades\UrlProcessor;
use EvolutionCMS\Main\Models\Page;

class IndexController extends BaseController
{
    public function render()
    {

      /*Создание главного меню на index странице*/
      /*получаю массив прикрепленных тв (id страницы и изображение)*/
      $pageIds = [];
      $page = Page::withTVs(['pagelinks'])->find(evo()->documentObject['id']);
      $links = ($page->pagelinks)['fieldValue'];

      /*получаю массив заголовков страниц по id*/
      foreach ($links as $link){
        $pageIds[] = $link['dropdown'];
      }

      $titles = Page::find($pageIds)->pluck('pagetitle', 'id')->toArray();

      $this->data['links'] = $links;
      $this->data['titles'] = $titles;

    }
}
