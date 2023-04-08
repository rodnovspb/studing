<?php

/**
 * Description of Transliteration
 *
 * @author Александр
 */

class Transliteration extends Base {
    
    private $rusLowCases = array("а", "б", "в", "г", "д", "е", "ё", "ж", "з", "и", "й", "к", "л", "м", "н", "о", "п", "р", "с", "т", "у", "ф", "х", "ц", "ч", "ш", "щ", "ь", "ъ", "ы", "э", "ю", "я");
    private $rusUpCases  = array("А", "Б", "В", "Г", "Д", "Е", "Ё", "Ж", "З", "И", "Й", "К", "Л", "М", "Н", "О", "П", "Р", "С", "Т", "У", "Ф", "Х", "Ц", "Ч", "Ш", "Щ", "Ь", "Ъ", "Ы", "Э", "Ю", "Я");
    private $latLowCases = array("a", "b", "v", "g", "d", "e", "yo", "zh", "z", "i", "y", "k", "l", "m", "n", "o", "p", "r", "s", "t", "u", "f", "kh", "ts", "ch", "sh", "csh", "'", "'", "y", "e", "yu", "ya");
    private $latUpCases  = array("A", "B", "V", "G", "D", "E", "YO", "ZH", "Z", "I", "Y", "K", "L", "M", "N", "O", "P", "R", "S", "T", "U", "F", "KH", "TS", "CH", "SH", "CSH", "'", "'", "Y", "E", "YU", "YA");
    private $rusAlphabet;
    private $latAlphabet;
    private $punctuation = array(" ","_",",","\"","'",);
    
    public function __construct() {
        $this->rusAlphabet = array_merge($this->rusUpCases, $this->rusLowCases);
        $this->latAlphabet = array_merge($this->latUpCases, $this->latLowCases);
    }

    public function run() {
        
        $arguments = func_get_args();
        $this->setParam(array_shift($arguments));

        if(!array_search('ToRUS', $arguments)) {
            $this->setParam($this->rusToLat());
        }
        if(array_search('URL', $arguments) !== FALSE) {
            $this->setParam($this->traslitToUrl());
        }

        return $this->getParam();
    }
    
    private function traslitToUrl() {
        if(!$str = $this->getParam()) return FALSE;
        $str = preg_replace('((\s))', ' ', $str);
        $str = trim($str);
        $str = $this->removeBOM($str);
        $str = str_replace($this->punctuation, "-", $str);
        $str = preg_replace("/\-?\(\S*\)\-?/i",'',$str);
        $str = str_replace('(','',$str);
        $str = str_replace(')','',$str);
        $str = str_replace('\'','', $str);
        $str = str_replace(',','-', $str);
        $str = str_replace('-','-', $str);            
        $str = str_replace(' ','-', $str);
        $str = str_replace('_','-', $str);
        $str = str_replace('__','-', $str);
        $str = str_replace('--','-', $str);
        $str = str_replace('--','-', $str);
        return mb_strtolower($str);
    }
    
    private function rusToLat() {
        $str = str_replace($this->rusAlphabet, $this->latAlphabet, $this->getParam());
        return $str;
    }
    
    private function removeBOM($str = "") {
        if (substr($str, 0, 3) == pack('CCC', 0xef, 0xbb, 0xbf)) {
            $str = substr($str, 3);
        }
        return $str;
    }

}
