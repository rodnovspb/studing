<?php

namespace Project\Controllers;
use \Core\Controller;

class NumController extends Controller {
    public function sum($params) {
        $this->title = 'Контроллер num, действие sum';
        echo array_sum($params);
    }
}