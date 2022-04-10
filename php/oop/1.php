<?php

class Tag {
    private $name;
    private $attr=[];
    function __construct($name)
    {
        $this->name=$name;
    }
    public function open(){
        $name = $this->name;
        $strAtr = '';
        if(!empty($this->attr)){
            foreach ($this->attr as $key=>$value){
                if($value !==true){
                $strAtr .= " $key=\"$value\"";
                } else {
                    $strAtr .= " $key ";
                }
            }
        }

        return "<$name $strAtr>";
    }
    public function close(){
        $name = $this->name;
        return "</$name>";
    }
    public function add($name, $value){
        $this->attr[$name] = $value;
        return $this;
    }
    public function remove($name){
        if(isset($this->attr[$name])){
            unset($this->attr[$name]);
        }
    }
    public function setAttrs($attrs){
        foreach ($attrs as $key=>$value){
            $this->add($key, $value);
        }
        return $this;
    }
//    private function createAttr(){
//        $strAtr = '';
//        if(!empty($this->attr)){
//            foreach ($this->attr as $key=>$value){
//                $strAtr .= " $key=\"$value\"";
//            }
//        }
//        return $strAtr;
//    }
}


echo (new Tag('input'))
    ->add('name', 'name1')
    ->open();

echo (new Tag('input'))
    ->add('name', 'name2')
    ->open();



