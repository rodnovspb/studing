<?php
require_once 'show.php';


// Инициализация парсера XML Expat
$expat_parser = xml_parser_create();
// Декларируем функцию, которую мы будем использовать в начале элемента
function start($expat_parser,$_name,$_attrs) {
    switch($_name) {
        case "NOTE":
            echo "-- Note --<br>";
            break;
        case "TO":
            echo "Recipient: ";
            break;
        case "FROM":
            echo "Sender: ";
            break;
        case "HEADING":
            echo "Topic: ";
            break;
        case "BODY":
            echo "Letter: ";
    }
}
// Объявляем функцию, которую мы будем использовать в конце элемента
function stop($expat_parser, $_name) {
    echo "<br>";
}
//Декларируем функцию, которую мы будем использовать для поиска символьных данных
function char($expat_parser, $data) {
    echo $data;
}
// Декларируем обработчик для наших элементов
xml_set_element_handler($expat_parser, "start", "stop");
// Декларируем обработчик для наших элементов
xml_set_character_data_handler($expat_parser, "char");
// Откройте XML-файл, который мы хотим прочитать
$fp = fopen("file.xml", "r");
// Читаем наши данные
while ($data=fread($fp,4096)) {
    xml_parse($expat_parser, $data, feof($fp)) or die (sprintf("XML Error: %s at line %d", xml_error_string(xml_get_error_code($expat_parser)), xml_get_current_line_number($expat_parser)));
}
// прекращаем использование XML Expat Parser
xml_parser_free($expat_parser);
?>




