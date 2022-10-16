<?php


namespace wfm;


use function Symfony\Component\String\s;

class Router
{
    protected static array $routes = [];
    protected static array $route = [];
    
    public static function add($regexp, $route = []) {
        self::$routes[$regexp] = $route;
    }
    
    public static function getRoutes():array {
        return self::$routes;
    }
    
    public static function getRoute():array {
        return self::$route;
    }
    
    public static function dispatch($url) {
        if(self::matchRoot($url)){
            show('ok');
        } else {
            show('no');
        }
    }
    
    public static function matchRoot($url): bool {
        foreach (self::$routes as $pattern => $route){
            if(preg_match("#{$pattern}#", $url, $matches)){
                foreach ($matches as $k => $v) {
                    if(is_string($k)){
                        $route[$k] = $v;
                    }
                }
                if(empty($route['action'])){
                    $route['action'] = 'index';
                }
                if(!isset($route['admin_prefix'])){
                    $route['admin_prefix'] = '';
                } else {
                    $route['admin_prefix'] = '\\';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                return true;
            }
        }
        return false;
    }
    
    protected static function upperCamelCase($name):string {
        $name = str_replace('-', ' ', $name);
        $name = ucwords($name);
        $name = str_replace(' ', '', $name);
        return $name;
    }
    
    protected static function lowerCamelCase($name):string {
        $name = lcfirst(self::upperCamelCase($name));
        return $name;
    }
}




















