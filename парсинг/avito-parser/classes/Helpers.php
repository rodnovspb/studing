<?php
class Helpers {
    
    public function existControl($needle, $haystack) {
        if(array_search($needle, $haystack) !== FALSE) return TRUE;
        return FALSE;
    }
    
    public function myNumberFormat($float) {
        $str = (string)$float;
        $str = str_replace(',', '.', $str);
        return $str;
    }
    
    public function getNumEnding($number, $endingArray) {
        $number = $number % 100;
        if ($number >= 11 && $number <= 19) {
            $ending = $endingArray[2];
        } else {
            $i = $number % 10;
            switch ($i) {
                case (1): $ending = $endingArray[0];
                    break;
                case (2):
                case (3):
                case (4): $ending = $endingArray[1];
                    break;
                default: $ending = $endingArray[2];
            }
        }
        return $ending;
    }

}
