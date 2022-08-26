<?php // этот php-код компилирует less/style.less в css/style.css
require "./assets/less/lessc.inc.php";
function autoCompileLess($inputFile, $outputFile) {
    // load the cache
    $cacheFile = $inputFile.".cache";
    if (file_exists($cacheFile)) {
        $cache = unserialize(file_get_contents($cacheFile));
    } else {
        $cache = $inputFile;
    }
    $less = new lessc;
    $newCache = $less->cachedCompile($cache);
    if (!is_array($cache) || $newCache["updated"] > $cache["updated"]) {
        file_put_contents($cacheFile, serialize($newCache));
        file_put_contents($outputFile, $newCache['compiled']);
    }
}
autoCompileLess('./assets/less/style.less', './assets/css/style.css');
// class="col-xs-6 wow fadeIn" data-wow-delay="0.3s" data-wow-duration="0.6s"
?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--<meta name="viewport" content="width=1200px">-->

    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <!--<link rel="apple-touch-icon" href="ссылка на фавикон для apple">
        <link rel="apple-touch-icon" sizes="72x72" href="ссылка на фавикон для apple">
        <link rel="apple-touch-icon" sizes="114x114" href="ссылка на фавикон для apple"> -->

    <!-- <meta property="og:image" content="ссылка на картинку для превью"> -->
    <link rel="stylesheet" href="./assets/css/style.css" type="text/css" />
</head>

<body>
    <div class="wrapper">
        <div id="mobile-menu">
            <div class="block df">
                <ul>
                    <li><a href=""><span>Link</span></a></li>
                    <li><a href=""><span>Link</span></a></li>
                    <li><a href=""><span>Link</span></a></li>
                    <li><a href=""><span>Link</span></a></li>
                </ul>
            </div>
        </div>
        <header>
            <div class="line1">
                <div class="container">
                <div class="block">
                    <a class="logo" href="/">
                        <img src="assets/img/logo.svg" alt="">
                        <span>Учебный центр <br>эстетической косметологии</span>
                    </a>
                    <a class="tel" href="tel:0800508622">0 (800) 508-622</a>
                    <div class="soc">
                        <a href=""><img src="assets/img/fb.svg" alt=""></a>
                        <a href=""><img src="assets/img/inst.svg" alt=""></a>
                    </div>
                    <div class="lang">
                        <div class="current-lang">
                            <img class="lang-icon" src="assets/img/ru.svg" alt="">
                            <img class="arr" src="assets/img/arr.svg" alt="">
                        </div>
                    </div>
                    <!-- Кнопка Мобильного Меню -->
                    <button id="burger-menu">
                        <div class="box box_item1"></div>
                        <div class="box box_item2"></div>
                        <div class="box box_item3"></div>
                    </button>
                </div>
            </div>
            </div>
            <div class="line2">
                <div class="container">
                    <nav>
                        <ul>
                            <li><a href="#">Курсы обучения</a></li>
                            <li><a href="#">Вебинары</a></li>
                            <li><a href="#">Видео-уроки</a></li>
                            <li><a href="#">Блог</a></li>
                            <li><a href="#">О нас</a></li>
                            <li><a href="#">Прайс</a></li>
                            <li><a href="#">Рассписание</a></li>
                            <li><a href="#">Акции</a></li>
                            <li><a href="#">Магазин</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </header>
