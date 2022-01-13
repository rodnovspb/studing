<?php





$arr = [
    '2019-12-29'=> ['name1', 'name2', 'name3', 'name4'],
    '2019-12-30'=> ['name5', 'name6', 'name7'],
    '2019-12-31'=> ['name8', 'name9'],
];

$obj = [];
foreach ($arr as $key=>$item){
    foreach ($item as $value){
        $a['date'] = $key;
        $a['event'] = $value;
        $obj[] = $a;
    }
}

var_dump($obj);


























?>