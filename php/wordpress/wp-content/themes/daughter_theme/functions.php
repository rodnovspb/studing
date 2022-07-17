<?php

add_action('wp_footer', function (){
    echo "<div class='daughter_footer'>Загружено из дочерней темы добавлением хука к событию wp_footer</div>";
});

//Переопределяем функцию родительской темы
function add_recommend($excerpt){
    $arr = ["Сногсшибательная статья: ", "Еще более сногсшибательная статья: "];
    return "<div class='recommend'>" . $arr[array_rand($arr)] . "</div>" . $excerpt;
}


