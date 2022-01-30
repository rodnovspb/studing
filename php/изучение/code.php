<?php

$arr = [
    [
        'name' => 'user1',
        'age'  => 30,
    ],
    [
        'name' => 'user2',
        'age'  => 31,
    ],
    [
        'name' => 'user3',
        'age'  => 32,
    ],
];

?>


<?php foreach ($arr as $item): ?>
<div>
    <p>name: <?= $item['name'] ?></p>
    <p>age: <?= $item['age'] ?></p>
</div>
<?php endforeach; ?>