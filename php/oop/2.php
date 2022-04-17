<?php

class TagHelper {
    public function open($name, $attrs){
        $attrsstr = $this->getAtrtrs($attrs);
        return "<$name$attrsstr>";
    }
    public function getAtrtrs($attrs){
        $result = '';
        if(!empty($attrs)){
        foreach ($attrs as $key=>$value){
            if($value===true){
                $result .= " $key";
            } else {
                $result .= " $key='$value'";
            }
        }
            return $result;
        }
    }
    public function close($name){
        return "</$name>";
    }
    public function show($name, $text, $attrs=[]){
        return $this->open($name, $attrs) . $text . $this->close($name);
    }
}

class FormHelper extends TagHelper {
    public function openForm($attrs){
        return $this->open('form', $attrs);
    }
    public function closeForm() {
        return $this->close('form');
    }
    public function input($attrs=[]){
        if(isset($attrs['name'])){
            $name = $attrs['name'];
            if(isset($_REQUEST[$name])){
                $attrs['value'] = $_REQUEST[$name];
            }
        }
        return $this->open('input', $attrs);
    }
    public function password($attrs=[]){
        $attrs['type'] = 'password';
        return $this->input($attrs);
    }
    public function hidden($attrs=[]){
        $attrs['type'] = 'hidden';
        return $this->open('input', $attrs);
    }
    public function submit($attrs=[]){
        $attrs['type'] = 'submit';
        return $this->open('input', $attrs);
    }
    public function checkbox($attrs=[]){
        $attrs['type'] = 'checkbox';
        $attrs['value'] = 1;
        if(isset($attrs['name'])){
            $name =  $attrs['name'];
            if(isset($_REQUEST[$name]) and $_REQUEST[$name] == 1){
                $attrs['checked'] = true;
            }
            $hidden = $this->hidden(['name'=>$name, "value"=>0]);
        } else {
            $hidden='';
        }
        return $hidden . $this->open('input', $attrs);
    }
}

echo (new FormHelper)->openForm(['action'=>' ', 'method'=>'get']);
echo (new FormHelper)->checkbox(['name'=>'elem1']);
echo (new FormHelper)->input(['name'=>'year']);
echo (new FormHelper)->submit();
echo (new FormHelper)->closeForm();



