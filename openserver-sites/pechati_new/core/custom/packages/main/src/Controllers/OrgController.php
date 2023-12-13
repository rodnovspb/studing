<?php

namespace EvolutionCMS\Main\Controllers;

class OrgController extends BaseController
{
  public function render()
  {
    $this->getPageData();

    $this->data['text_inn'] = 'ИНН или ОГРН';

    $this->data['name'] = 'Название';
  }
}
