<?php







$arr = [
    ['value' => '1', 'text' => 'text1'],
    ['value' => '2', 'text' => 'text2'],
    ['value' => '3', 'text' => 'text3'],
];

echo "<select>";
    foreach ($arr as $item){
        echo "<option value='{$item['value']}'>$item[text]</option>";
    }
echo "</select>";























































?>