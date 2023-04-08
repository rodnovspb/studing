<?php

class Views extends Base {
    
    private $viewsFolder = 'views/';
    
    public function loadView($viewName = NULL, $params = NULL) {        
        if(!$viewName OR $viewName == 'default') {
            $viewName = VIEW;
        }
        if($params) {
            if(is_array($params)) {
                foreach($params as $key => $val) {
                    ${$key} = $val;
                }
            } else if(is_object($params)) {
                foreach($params as $key => $val) {
                    ${$key} = $val;
                }
            } else {
                $text = $params;
            }
        }
        ob_start();
        include VIEWS.VIEW.DS.$viewName.'.php';
        echo PHP_EOL;
        return ob_get_clean();
    }
    
    public function loadJSfile($viewName = NULL) {
        if(!$viewName OR $viewName == 'default') {
            $viewName = VIEW;
        }
        $filename = VIEWS.VIEW.DS.$viewName.'.js';
        if(file_exists($filename)) {
            return '<script src="'.$this->viewsFolder.VIEW.'/'.$viewName.'.js"></script>'.PHP_EOL;;
        } else {
            return '';
        }
    }
    
    public function loadJS($viewName = NULL) {
        if(!$viewName) {
            $viewName = VIEW;
        }
        $filename = VIEWS.VIEW.DS.$viewName.'.js';
        if(file_exists($filename)) {
            ob_start();
            echo "<script>".PHP_EOL;
            include $filename;
            echo PHP_EOL."</script>".PHP_EOL;          
            return ob_get_clean();
        } else {
            return '';
        }       
    }
    
    public function loadCSS($viewName = NULL) {
        if(!$viewName) {
            $viewName = VIEW;
        }
        $filename = VIEWS.VIEW.DS.$viewName.'.css';
        if(file_exists($filename)) {
            return '<link href="'.$this->viewsFolder.VIEW.'/'.$viewName.'.css" rel="stylesheet" />'.PHP_EOL;
        } else {
            return '';
        }       
    }
    
}
