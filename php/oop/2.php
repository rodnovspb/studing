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

$div = new TagHelper();
echo $div->open('div', ['class'=>'elem']) . 'text' . $div->close('div');

$form = new TagHelper;
$inputText = new TagHelper;
$inputSubmit = new TagHelper;
echo $form->open('form', ['method'=>'get', 'action'=>' ']);
echo $inputText->open('input', ['name'=>'elem']);
echo $inputSubmit->open('input', ['type'=>'submit']);
echo $form->close('form');

$span = new TagHelper;
echo $span->show('span', 'это спан', ['class'=>'elem1']);

