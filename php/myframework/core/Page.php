<?php
namespace Core;

class Page {
    private $layout;
    private $title;
    private $view;
    private $data;
    public function __construct($layout, $title, $view, $data)
    {
        $this->layout = $layout;
        $this->title  = $title;
        $this->view   = $view;
        $this->data   = $data;
    }
    public function __get($name)
    {
        return $this->$name;
    }
}