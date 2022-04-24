<?php

namespace Core;

class Router {
    private $routes;
    private function createPattern($path){
        return '#^' . preg_replace('#:([^/]+)#', '/(?<$1>[^/]+)', $path) . '/?#';
    }
    private function clearParams($params){
        $result = [];
        foreach ($params as $key=>$value){
            if(!is_int($key)){
                $result[$key] = $value;
            }
        }
        return $result;
    }
    public function getTrack($routes, $uri){
        foreach ($routes as $route){
            $pattern = $this->createPattern($route->path);
            if(preg_match($pattern, $uri, $params)){
                $params->$this->clearParams($params);
                return new Track($route->controller, $route->action, $params);
            }
            return new Track('error', 'notFound');
        }
    }
}