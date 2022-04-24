<?php
namespace Core;

class Controller {
    protected $layout = 'default';
    protected $title = 'Заголовок по умолчанию';
    protected function render($view, $data){
        return new Page($this->layout, $this->title, $view, $data);
    }
}