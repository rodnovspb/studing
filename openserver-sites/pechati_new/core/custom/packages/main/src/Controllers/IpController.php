<?php

namespace EvolutionCMS\Main\Controllers;


use Illuminate\Http\Request;

class IpController extends BaseController
{

  public function render(){

    $this->getPageData();

    $this->data['text_inn'] = 'ИНН или ОГРНИП';

    $this->data['name'] = 'ФИО';

  }

}
