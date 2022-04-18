<?php

interface iTag {
    public function open();
    public function close();
    public function add($name, $value);
    public function remove($name);
    public function setAttrs($attrs);
    public function addClass($className);
    public function removeClass($className);
    public function getName();
    public function getText();
    public function getAttrs();
    public function getAttr($attr);
    public function setText($text);
    public function show();

}

class Tag implements iTag {
    private $name;
    private $attr = [];
    private $text;

    function __construct($name) {
        $this->name = $name;
    }

    public function open() {
        $name = $this->name;
        $strAtr = '';
        if (!empty($this->attr)) {
            foreach ($this->attr as $key => $value) {
                if ($value !== true) {
                    $strAtr .= " $key=\"$value\"";
                } else {
                    $strAtr .= " $key ";
                }
            }
        }
        return "<$name $strAtr>";
    }

    public function close() {
        $name = $this->name;
        return "</$name>";
    }

    public function show() {
        return $this->open() . $this->text . $this->close();
    }

    public function add($name, $value) {
        $this->attr[$name] = $value;
        return $this;
    }

    public function remove($name) {
        if (isset($this->attr[$name])) {
            unset($this->attr[$name]);
        }
    }

    public function setAttrs($attrs) {
        foreach ($attrs as $key => $value) {
            $this->add($key, $value);
        }
        return $this;
    }

    public function addClass($className) {
        if (!isset($this->attr['class'])) {
            $this->attr['class'] = $className;
        } else {
            $arr = explode(' ', $this->attr['class']);
            if (!in_array($className, $arr)) {
                $arr[] = $className;
            }
            $str = implode(' ', $arr);
            $this->attr['class'] = $str;
        }
        return $this;
    }

    public function removeClass($className) {
        if (isset($this->attr['class'])) {
            $arr = explode(' ', $this->attr['class']);
            if (in_array($className, $arr)) {
                $arr = $this->removeElem($className, $arr);
            }
            $str = implode(' ', $arr);
            $this->attr['class'] = $str;
            if ($this->attr['class'] === '') {
                unset($this->attr['class']);
            }
        }
        return $this;
    }

    private function removeElem($elem, $arr) {
        $key = array_search($elem, $arr);
        array_splice($arr, $key, 1);
        return $arr;
    }

    public function getName() {
        return $this->name;
    }

    public function getText() {
        return $this->text;
    }

    public function getAttrs() {
        return $this->attr;
    }

    public function getAttr($attr) {
        return $this->attr[$attr] ?? null;
    }

    public function setText($text) {
        $this->text = $text;
        return $this;
    }
}


class Img extends Tag{
    public function __construct()
    {
        $this->setAttrs(['src'=>' ', 'alt'=>' ']);
        parent::__construct('img');
    }
    public function __toString()
    {
        return $this->open();
    }
}

class Link extends Tag {
    const ACTIVE_LINK = 'active';
    public function __construct()
    {
        $this->setAttrs(['href'=>'']);
        parent::__construct('a');
    }
    public function open()
    {
        $this->activateSelf();
        return parent::open();
    }
    private function activateSelf(){
        $file =  pathinfo($_SERVER['REQUEST_URI'])['filename']. ".php";
        if($this->getAttr('href') ===  $file ){
            $this->addClass(self::ACTIVE_LINK);
        }
    }
}

class ListItem extends Tag {
    function __construct()
    {
        parent::__construct('li');
    }
    function __toString()
    {
        return $this->show();
    }
}

class HtmlList extends Tag {
    private $items = [];
    public function addItem (ListItem $li) {
        $this->items[] = $li;
        return $this;
    }
    public function show()
    {
        $result = $this->open();
            foreach ($this->items as $item){
                $result .=$item;
            }
        $result .= $this->close();
        return $result;
    }
    public function __toString()
    {
        return $this->show();
    }
}

class Ul extends HtmlList {
    public function __construct()
    {
        parent::__construct('ul');
    }
}

class Ol extends HtmlList {
    public function __construct()
    {
        parent::__construct('ol');
    }
}

class Form extends Tag {
    public function __construct()
    {
        parent::__construct('form');
    }
}
class Input extends Tag {
    function __construct()
    {
        parent::__construct('input');
    }
    public function open(){
        $name = $this->getAttr('name');
        if($name){
        if(isset($_REQUEST[$name])) {
            $this->setAttrs(['value'=>$_REQUEST[$name]]);
        }
        }
        return parent::open();
    }

    public function __toString()
    {
        return $this->open();
    }
}
class Submit extends Input {
    public function __construct()
    {
        $this->setAttrs(['type'=>'submit']);
        parent::__construct();
    }
}
class Password extends Input {
    public function __construct()
    {
        $this->setAttrs(['type' => 'password']);
        parent::__construct();
    }
}

class Hidden extends Input {
    public function __construct()
    {
        $this->setAttrs(['type'=>'hidden']);
        parent::__construct();
    }
}

class Textarea extends Tag {
    public function __construct() {
        parent::__construct('textarea');
    }
        public function open(){
            $name = $this->getAttr('name');
            if(isset($name) && isset($_REQUEST[$name])) {
                $this->setText($_REQUEST[$name]);
            }
            return parent::open();
        }
}

class Chekbox extends Tag {
    function __construct()
    {
        parent::__construct('input');
        $this->setAttrs(['type'=>'checkbox', 'value'=>'1']);
    }
    public function open()
    {
        $name = $this->getAttr('name');
        if(isset($name)){
        if(isset($_REQUEST[$name])){
            $value = $_REQUEST[$name];
            if($value==1){
                $this->setAttrs(['checked'=>true]);
            } else {
                $this->remove('checked');
            }
        }
        return parent::open();
        } else {
            return parent::open();
        }
    }
    function __toString()
    {
        return $this->open();
    }
}

class Radio extends Tag {
    public function __construct()
    {
        $this->setAttrs(['type'=>'radio']);
        parent::__construct('input');
    }

    public function open(){
        $name = $this->getAttr('name');
        $value = $this->getAttr('value');
        if(isset($name)){
            if($_REQUEST[$name]==$value){
                $this->setAttrs(['checked'=>true]);
            }
        }   return parent::open();

    }
    public function __toString()
    {
        return $this->open();
    }
}

class Option extends Tag {
    public function __construct(){
        parent::__construct('option');
    }
    public function __toString()
    {
        return $this->show();
    }
    public function setSelected(){
        $this->setAttrs(['selected'=>true]);
        return $this;
    }
}

class Select extends Tag {
    private $options;
    public function __construct(){
        parent::__construct('select');
    }
    public function addItem(Option $option){
        $this->options[] = $option;
        return $this;
    }
    public function show(){
       $result = $this->open();
       $name = $this->getAttr('name');
       $value = $_REQUEST[$name];
       foreach ($this->options as $option) {
           if(isset($value) && ($option->getAttr('value'))===$value){
               $option->setSelected();
           } else {
               $option->remove('selected');
           }
           $result .= $option;
       }
       $result .= $this->close();
       return $result;
    }
    public function __toString()
    {
        return $this->show();
    }
}


$form1 = new Form;
$form1->setAttrs(['action'=>'', 'method'=>'GET']);
$select = new Select;
echo $form1->open();
    echo $select->setAttrs(['name'=>'list'])
        ->addItem((new Option)->setAttrs(['value'=>'1'])->setText('option1'))
        ->addItem((new Option)->setAttrs(['value'=>'2'])->setText('option2')->setSelected())
        ->addItem((new Option)->setAttrs(['value'=>'3'])->setText('option3'))
        ->addItem((new Option)->setAttrs(['value'=>'4'])->setText('option4'))
        ->addItem((new Option)->setAttrs(['value'=>'5'])->setText('option5'))
        ->addItem((new Option)->setAttrs(['value'=>'6'])->setText('option6'));
    echo new Submit;
echo $form1->close();






$form = new Form;
$form->setAttrs(['action'=>'', 'method'=>'GET']);
echo $form->open();
echo (new Radio)->setAttrs(['name'=>'radio', 'value'=>'1']);
echo (new Radio)->setAttrs(['name'=>'radio', 'value'=>'2']);
echo (new Radio)->setAttrs(['name'=>'radio', 'value'=>'3']);
echo new Submit;
echo $form->close();









