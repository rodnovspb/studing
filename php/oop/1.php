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
        return $this->attr['text'] ?? null;
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

$uList = new Ul();
echo $uList
    ->addItem((new ListItem())->setText('item1'))
    ->addItem((new ListItem())->setText('item2'))
    ->addItem((new ListItem())->setText('item3'));

$oList = new Ol();
echo $oList
        ->addItem((new ListItem())->setText('item1'))
        ->addItem((new ListItem())->setText('item2'))
        ->addItem((new ListItem())->setText('item3'));






