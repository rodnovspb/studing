<?php







$arr = [
    ['href'=>'page1.html', 'text'=>'text1'],
    ['href'=>'page2.html', 'text'=>'text2'],
    ['href'=>'page3.html', 'text'=>'text3'],
];

echo "<ul>";
    foreach ($arr as $elem){
        echo "<li><a href=\"$elem[href]\">$elem[text]</a></li>";
    }
echo "</ul>";























































?>