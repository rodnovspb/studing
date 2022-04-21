<?php

namespace Project\Controllers;
use \Core\Controller;

class NumController extends Controller {
    public function sum($params) {
        echo array_sum($params);
    }
}