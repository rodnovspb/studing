<?php



$settings['display'] = 'vertical';
$settings['fields'] = array(
  'dropdown' => array(
    'caption' => 'Страница',
    'type' => 'dropdown',
    'elements' => '@SELECT pagetitle, id FROM [+PREFIX+]site_content WHERE parent = 0 ORDER BY menuindex ASC'
  ),
  'image' => array(
    'caption' => 'Изображение',
    'type' => 'image'
  ),
  'thumb' => array(
    'caption' => 'Thumbnail',
    'type' => 'thumb',
    'thumbof' => 'image'
  ));
