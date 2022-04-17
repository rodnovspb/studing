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
    public function textarea($text, $attrs=[]){
        if(isset($attrs['name'])){
            $name = $attrs['name'];
            if(isset($_REQUEST[$name])){
                return $this->show('textarea', $_REQUEST[$attrs['name']], $attrs);
            }else{
                return $this->open('textarea', $attrs) . $text . $this->close('textarea');
            }
        }
    }
    public function select($attrs=[], $options=[]){
        $result = $this->open('select', $attrs);
        if(isset($attrs['name'])){
            $name = $attrs['name'];
            if(isset($_REQUEST[$name])){
                $value = $_REQUEST[$name];
            }
        }
        foreach ($options as $option){
            if(isset($value)){
                unset($option['attrs']['selected']);
                if($option['attrs']['value']== $value){
                    $option['attrs']['selected'] = true;
                }
            }
            $result .=$this->open('option', $option['attrs']) . $option['text'] . $this->close('option');
        }
        $result .=$this->close('select');
        return $result;
    }
}

echo (new FormHelper)->openForm(['action'=>' ', 'method'=>'post']);
echo (new FormHelper)->checkbox(['name'=>'elem1']);
echo (new FormHelper)->input(['name'=>'year']);
echo (new FormHelper)->textarea('qqqqqqqqqq', ['name'=>'textarea']);
echo (new FormHelper)->select(['name' => 'list', 'class' => 'eee'], [
    ['text' => 'item1', 'attrs' => ['value' => '1']],
    ['text' => 'item2', 'attrs' => ['value' => '2', 'selected' => true]],
    ['text' => 'item3', 'attrs' => ['value' => '3', 'class' => 'last']],
]);
echo (new FormHelper)->submit();
echo (new FormHelper)->closeForm();



