<?php

class Test1 {
    public $name;
    function __construct($name)
    {
        $this->name=$name;
    }
}
class Test2 {
    public $name;
    function __construct($name)
    {
        $this->name=$name;
    }
}

$one=new Test1('asd');
$one1=new Test1('aesd');
$one2=new Test1('asrd');
$two = new Test2('dasf');
$two1 = new Test2('dadsf');
$two2 = new Test2('daasf');
$arr = [$one, $one2, $two1, $one1, $two, $two2];

foreach ($arr as $item){
    echo $item->name. " " . get_class($item) . '<br>';

}