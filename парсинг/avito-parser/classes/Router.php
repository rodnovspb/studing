<?php

/*
 * Article publisher by MasterMed
 * Made especially for Migauto.ru
 * Skype: mastermed24
 * E-mail: gafuroff.al@yandex.ru
 * 18.11.2018 
 * File: Router.php 
 * Encoding: UTF-8 
 * Project: migauto.loc
 */

class Router extends Base {
    
    public $ctrlr;
    public $action;
    public $params;
    public $post = FALSE;

    public function route() {
        if($_GET != NULL) {
            foreach($_GET as $key => $value) {
                $str = $value;
                $str = trim($str);
                $str = stripslashes($str);
                $str = htmlspecialchars($str);
                if($key == 'route' OR $key == 'action') {
                    if($key == 'route') { $this->setNamedParam('ctrlr', $str); }
                    if($key == 'action') { $this->setNamedParam('action', $str); }
                } else {
                    $this->setNamedParam($key, $str);
                }                
            }
            return $this;
        }        
    }
    
    public function checkPost() {
        if($_POST != NULL) {
            return TRUE;
        }
        return FALSE;
    }
    
    public function getPost() {
        if($_POST != NULL) {
            $this->post = new \stdClass;
            foreach($_POST as $key => $value) {
                $str = $value;
                if(is_string($str)) {
                    $str = trim($str);
                }                
                $this->post->{$key} = ($value) ? $value : NULL;
            }
            return $this;
        }
    }
    
}
