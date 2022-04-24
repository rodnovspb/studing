<?php

namespace Core;

class Dispatcher {
    public function getPage(Track $track){
        $className = ucfirst($this->controller) . 'Controller';
        $fullname = "\\Project\\Controllers" . $className;
        try {
        $controller = new $fullname;
        if(method_exists($controller, $track->action)){
            $result = $controller->{$track->action}($track->params);
            if($result) {
                return $result;
            } else {
                return new Page('default');
            }
        } else {
            echo "<b>Метод $track->action не найден в контроллере $controller</b>";
            die();
        }
        } catch (\Exception $error) {
            echo $error->getMessage(); die();
        }
    }
}