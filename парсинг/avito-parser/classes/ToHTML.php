<?php
class ToHTML {
    
    public static function linklist($param) {
        if(is_array($param)) {
            $ret = '<p><ul>';
            foreach($param as $value) {
                $title = @($value['title']) ? " title='".$value['title']."'" : NULL;
                $class = @($value['class']) ? " class='".$value['class']."'" : NULL;
                $ret .= "<li{$class}><a href='".$value['link']."'{$title}>".$value['name']."</a></li>";
            }
            $ret .= '</ul></p>';
            return $ret;
        }
        return FALSE;
    }
    
    public static function link($params) {
        $title = @$params['title'] ? ' title = "'.$params['title'].'"' : '';
        $class = @$params['class'] ? ' class = "'.$params['class'].'"' : '';
        return '<a'.$class.' href="'.$params['link'].'"'.$title.'>'.$params['name'].'</a>';
    }
    
    public static function p($text, $class = NULL) {
        $class = ($class) ? " class='$class'" : NULL;
        return "<p{$class}>".$text."</p>";
    }
    
    public static function header($numb, $text, $class = NULL) {
        $class = ($class) ? " class='$class'" : NULL;
        return "<h$numb$class>$text</h$numb>";
    }
    
    public static function formOpen($name = NULL, $class = NULL, $role = NULL, $method = NULL, $action = NULL, $enctype = NULL) {
        $method = ($method) ? " method='$method'" : " method='POST'";
        $role = ($role) ? " role='$role'" : "rele='form";
        $action = ($action) ? " action='$action'" : NULL;
        $class = ($class) ? " class='$class'" : NULL;
        $name = ($name) ? " id='$name' name='$name'" : NULL;
        $enctype = ($enctype) ? " enctype='multipart/form-data'" : " enctype='application/x-www-form-urlencoded'";
        return "<form{$method}{$name}{$action}{$class}{$enctype}>".PHP_EOL;
    }
    
    public static function select($name, $params, $label = NULL, $prompt = NULL, $class = NULL, $selected = NULL, $multiple = NULL) {
        $select = NULL;
        $class = ($class) ? " class='$class'" : NULL;
        $multiple = ($multiple) ? " multiple='1" : NULL;
        $return = ($label) ? "<label for='$name'>$label</label>".PHP_EOL : NULL;
        $return .= "<select id='$name' name='$name'{$class}{$multiple}>".PHP_EOL;
        $return .= ($prompt) ? '<option value="0">'.$prompt.'</option>' : NULL;
        foreach ($params as $key=>$value) {
            if($selected != NULL && $selected == $value) {
                $select = " selected";
            } else {
                $select = NULL;
            }
            $return .= "<option value='$value'{$select}>$key</option>".PHP_EOL;
        }
        $return .= "</select>".PHP_EOL;
        return $return;
    }
    
    public static function input($name, $type = NULL, $label = NULL, $class = NULL, $value = NULL, $placeholder = NULL, $params = NULL) {
        $type = ($type) ? " type='$type'" : "type='text'";
        $class = ($class) ? " class='$class'" : NULL;
        $value = ($value) ? " value='$value'" : NULL;
        $placeholder = ($placeholder) ? " placeholder='$placeholder'" : NULL;
        $return = ($label) ? "<label for='$name'>$label</label>".PHP_EOL : NULL;        
        return $return."<input id='$name' name='$name'{$type}{$class}{$value}{$placeholder}{$params} />".PHP_EOL;
    }
    
    public static function textarea($name, $label = NULL, $class = NULL, $value = NULL, $placeholder = NULL, $maxlength = NULL, $cols = NULL, $rows = NULL) {
        $class = ($class) ? " class='$class'" : NULL;
        $value = ($value) ? $value : '';
        $placeholder = ($placeholder) ? " placeholder='$placeholder'" : NULL;
        $maxlength = ($maxlength) ? " maxlength='$maxlength'" : NULL;
        $cols = ($cols) ? " cols='$cols'" : NULL;
        $rows = ($rows) ? " rows='$rows'" : NULL;
        $return = ($label) ? "<label for='$name'>$label</label>".PHP_EOL : NULL; 
        return $return."<textarea id='$name' name='$name'{$class}{$placeholder}{$maxlength}{$cols}{$rows}>{$value}</textarea>".PHP_EOL;
    }
    
    public static function checkbox($name, $label = NULL, $class = NULL, $value = NULL, $checked = NULL, $id = NULL ) {
        $class = ($class) ? " class='$class'" : NULL;
        $checked = ($checked) ? " checked='1'" : NULL;
        $value = ($value) ? " value='$value'" : NULL;
        $id = ($id) ? $id : $name;
        $labelOpen = ($label) ? "<label for='$id'>".PHP_EOL : NULL;
        $labelClose = ($label) ? "</label>".PHP_EOL : NULL;
        $label = ($label) ? " ".$label.PHP_EOL : NULL;
        return $labelOpen."<input type='checkbox' id='$id' name='$name'{$value}{$class}{$checked} />".$label.$labelClose;
    }
    
    public static function hidden($name, $value = NULL) {
        $value = ($value) ? $value : '0';
        return "<input type='hidden' id='$name' name='$name' value='$value' />".PHP_EOL;
    }
    
    public static function inputButton($name, $value, $type = NULL, $class = NULL, $params = NULL) {
        $class = ($class) ? " class='$class'" : NULL;
        $type = ($type) ? " type='$type'" : "type='button'";
        $params = ($params) ? ' '.$params : NULL;
        return "<input id='$name'{$type} value='{$value}'{$class}{$params} />".PHP_EOL;
    }
    
    public static function button($name, $value, $type = NULL, $class = NULL, $params = NULL) {
        $class = ($class) ? " class='$class'" : NULL;
        $type = ($type) ? " type='$type'" : "type='button'";
        $params = ($params) ? ' '.$params : NULL;
        return "<button id='$name' name='$name'{$type}{$class} />$value</button>".PHP_EOL;
    }
    
    public static function formClose() {
        return "</form>".PHP_EOL;
    }
    
}
