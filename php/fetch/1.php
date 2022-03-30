<?php

$id = isset($_GET['id']) ? (int)($_GET['id']) : -1;

$users = [
    1=>[
        'url'=>'img-01.jpg',
        'name'=>'Иван',
        'location'=>'Россия'
    ],
    2=>[
        'url'=>'img-02.jpg',
        'name'=>'Василий',
        'location'=>'Венгрия'
    ],
    3=>[
        'url'=>'img-03.jpg',
        'name'=>'Елена',
        'location'=>'Казахстан'
    ]
];



$output = ['count'=>0, 'data'=>[]];

if($id>0 and $id<=count($users)){
    $output['count'] = 1;
    $output['data'] = [$id=>$users[$id]];
}
elseif ($id==-1) {
    $output['count'] = count($users);
    $output['data'] = $users;
}

exit(json_encode($output));

?>