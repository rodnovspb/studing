<?php

use EvolutionCMS\Main\Models\Page;

$documents = Page::where('hidemenu', '!=', 1)->where('published', 1)->get();
$docs = '';

foreach ($documents as $document){
  $docs .= "$document[menutitle]==$document[id]||";
}

$docs = substr($docs, 0, -2);


return [
  'caption' => 'Меню',
  'settings' => [
    'menu' => [
      'caption' => 'Верхнее меню',
      'type' => 'checkbox',
      'elements' => $docs,
    ],

    'submenu' => [
      'caption' => 'Нижнее меню',
      'type' => 'checkbox',
      'elements' => $docs,
    ],
  ],
];
