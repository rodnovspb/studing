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
    <section class="page-404">
        <div class="container">
            <div class="block">
                <img src="assets/img/man404.svg" alt="">
                <div class="txt">
                    <div class="logo" href="/">
                        <img src="assets/img/logo.svg" alt="">
                        <span>Учебный центр <br>эстетической косметологии</span>
                    </div>
                    <div class="t1">Похоже, эта страница отсутствует</div>
                    <div class="t2">Мы обязательно разберемся с этим недоразумением!<br> А пока вернитесь на главную страницу</div>
                    <a href="#" class="to-home">Вернуться на главную</a>
                </div>
            </div>
        </div>
    </section>




    </div>

    <link rel="stylesheet" href="./assets/css/animate.css" type="text/css" />
        <!-- FOR MODAL -->
    <script src="./assets/js/classie.js"></script>
    <script src="./assets/js/modalEffects.js"></script>
    <script src="./assets/js/cssParser.js"></script>
        <!-- FOR MODAL -->

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="./assets/js/jquery.validate.min.js"></script>
    <script src="./assets/js/jquery.maskedinput.js"></script>
    <script src="./assets/js/wow.min.js"></script>

        <!-- https://github.com/verlok/vanilla-lazyload#-getting-started---html -->
    <script src="./assets/js/lazyload.js"></script>

        <!-- Counter -->
    <script src="./assets/js/counter/jquery.cookie.js"></script>
    <script src="./assets/js/counter/jquery.plugin.js"></script>
    <script src="./assets/js/counter/jquery.countdown.js"></script>
    <script src="./assets/js/counter/jquery.countdown-ru.js"></script>
    <script>
        var endDateTime = new Date();
		var nowDateTime = new Date(3600 * 24 * 1000);
    </script>
        <!-- End Counter -->
    <script src="https://www.youtube.com/iframe_api"></script>
    <script src="./assets/js/script.js"></script>

    <link rel="stylesheet" href="./assets/css/swiper/swiper-bundle.min.css">
    <script src="./assets/js/swiper/swiper-bundle.min.js"></script>
</body>
</html>
