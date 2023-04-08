<?php
// AJAX

if($route->action == 'loadNewButton') {
    if($post->buttonId AND $post->buttonValue AND $post->buttonClass) {
        $return = array();

            $arrId = explode("|", $post->buttonId);
            foreach($arrId as $k => $id) {
                if(strripos($post->buttonValue, "|")) {
                    $arrValue = explode("|", $post->buttonValue);
                    if(isset($arrValue[$k])) {
                        $value = $arrValue[$k];
                    } else {
                        $value = $arrValue[(count($arrValue) - 1)];
                    }                    
                } else {
                    $value = $post->buttonValue;
                }
                if(stripos($post->buttonClass, "|")) {
                    $arrClass = explode("|", $post->buttonClass);
                    if(isset($arrClass[$k])) {
                        $class = $arrClass[$k];
                    } else {
                        $class = $arrClass[(count($arrClass) - 1)];
                    }
                } else {
                    if($post->buttonClass == 'default') {
                        $class = 'primary';
                    } else {
                        $class = $post->buttonClass;
                    }
                }
                $return[] = ToHTML::inputButton($id, $value, 'button', 'btn btn-'.$class);
            }        
        echo implode(" ", $return);
    }    
}