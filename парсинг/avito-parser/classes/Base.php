<?php

/*
 * Article publisher by MasterMed
 * Made especially for Migauto.ru
 * Skype: mastermed24
 * E-mail: gafuroff.al@yandex.ru
 * 18.11.2018 
 * File: base.php 
 * Encoding: UTF-8 
 * Project: migauto.loc
 */

class Base {
    
    public $params = array();
    public $cargo;
    
    // Protected params
    public function set($key, $var) {
        if (isset($this->params[$key]) == true) {
            throw new Exception('Unable to set var `' . $key . '`. Already set.');
        }
        $this->params[$key] = $var;
        return true;
    }  

    public function get($key) {
        if (isset($this->params[$key]) == false) {
            return null;
        }
        return $this->params[$key];
    }
    
    public function delete($key) {
        $this->params[$key] = NULL;
        return TRUE;
    }

    public function remove($key) {
        unset($this->params[$key]);
        return TRUE;
    }   
    
    // Public params
    public function setNamedParam($key, $var) {
        $this->{$key} = $var;
        return TRUE;
    }
    
    public function setParam($var) {
        $this->cargo = $var;
        return TRUE;
    }
    
    public function getParam($key = FALSE) {
        if(!$key) {
            return $this->cargo;
        } 
        return $this->{$key};
    }   
}
