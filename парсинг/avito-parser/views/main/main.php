<?php

$linklist = array();
$linklist[] = array('name' => 'Настройка парсера', 'link' => '?route=crud_settings', 'class' => 'main_menu_link');

?>

<?= ToHTML::header(4, 'Настройка и запуск парсинга'); ?>
<?= ToHTML::linklist($linklist); ?>

<?php

unset($linklist);
$linklist = array();
$linklist[] = array('name' => 'Просмотреть, добавить, удалить прокси-сервер', 'link' => '?route=crud_proxy', 'class' => 'main_menu_link');

?>

<?= ToHTML::header(4, 'Подготовка данных для настройки парсера'); ?>
<?= ToHTML::linklist($linklist); ?>