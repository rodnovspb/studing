<?php

class Tag {
    private $name;
    private $attr;
    function __construct($name, $attr=[])
    {
        $this->name=$name;
        $this->attr=$attr;
    }
    public function open(){
        $name = $this->name;
        $atrr = $this->createAttr();
        return "<$name $atrr>";
    }
    public function close(){
        $name = $this->name;
        return "</$name>";
    }
    private function createAttr(){
        $strAtr = '';
        if(!empty($this->attr)){
            foreach ($this->attr as $key=>$value){
                $strAtr .= " $key=\"$value\"";
            }
        }
        return $strAtr;
    }
}


$input = new Tag('input', ['id'=>1, 'class'=>'elem']);
echo $input->open();


