<?php
// AJAX

if($route->action == 'clearStatus') {
    unset($_SESSION['current_status']);
}

if($route->action == 'checkSetting') {
    $setting = $_SESSION['current_setting'];
    $ret['URL запроса'] = 'https://www.avito.ru'.$setting['parseUrl'];
    $ret['Страниц с объявлениями'] = $setting['pagesCount'];
    $ret['Максимальное количество объявлений'] = $setting['annoucementsCount'];
    $ret['Время простоя между обращениями к страницам'] = $setting['timeoutCount'];
    $ret['Подстановка прокси'] = ($setting['useProxy'] == 'true') ? 'включена' : 'выключена';
    switch($setting['outputData']) {
        default:
            $ret['Выдача результатов парсинга'] = 'Таблица Excel 2007';
    }
    echo json_encode($ret);    
}

if($route->action == 'getSettingForParse') {
    $result['timeoutCount'] = $_SESSION['current_setting']['timeoutCount'];
    $result['pagesCount'] = $_SESSION['current_setting']['pagesCount'];
    $result['annoucementsCount'] = $_SESSION['current_setting']['annoucementsCount'];
    switch($_SESSION['current_setting']['outputData']) {
        default:
            $result['outputData'] = 'getParseResultExcel';
    }
    echo json_encode($result);
}

if($route->action == 'parseMainPage') {     
    if ($post->currentPage) {
        include (VENDOR . 'phpQuery.php');
        include (PARSER . 'curlModule.php');
        include (PARSER . 'parseModule.php');

        $setting = $_SESSION['current_setting'];
        if($setting['timeoutCount'] > 0) {
            sleep($setting['timeoutCount']);
        }

        $maxPages = $setting['pagesCount'] + 1;
        if ($post->currentPage >= $maxPages) {
            $result['stop_status'] = 'true';
        } else {        

            $proxy = FALSE;
            do {
                if ($setting['useProxy'] == 'true') {
                    $proxies = $data->loadProxyTable();
                    if ($proxies) {
                        $proxyKeys = array_keys($proxies);
                        $proxyItems = (count($proxyKeys) - 1);
                        $randKey = rand(0, $proxyItems);
                        //$randKey = random_int(0, $proxyItems);
                        $proxy = $proxies[$proxyKeys[$randKey]];
                    }
                }
                $mainPageContent = get_content($setting['parseUrl'], 'desktop', $post->currentPage, $proxy);
            } while (!$mainPageContent);

            $result = getParseMainResult($mainPageContent);       
        
            $result['stop_status'] = 'false';
        }

        echo json_encode($result);
    } else {
        echo 'Ошибка запроса, не передеан идентификатор текущей страницы';
    }
}

if($route->action == 'getParseInnerPage') {
    if($post->parseUrl AND $post->description AND $post->currentAnnounce) {        
        include (VENDOR . 'phpQuery.php');
        include (PARSER . 'curlModule.php');
        include (PARSER . 'parseModule.php');
        
        $setting = $_SESSION['current_setting'];
        if($setting['timeoutCount'] > 0) {
            sleep($setting['timeoutCount']);
        }
        
        $maxAnnounces = $setting['annoucementsCount'] + 1;
        
        if ($post->currentAnnounce >= $maxAnnounces) {
            $result['stop_status'] = 'true';
        } else {
        
            $proxy = FALSE;
            do {
                if ($setting['useProxy'] == 'true') {
                    $proxies = $data->loadProxyTable();
                    if ($proxies) {
                        $proxyKeys = array_keys($proxies);
                        $proxyItems = (count($proxyKeys) - 1);
                        $randKey = rand(0, $proxyItems);
                        //$randKey = random_int(0, $proxyItems);
                        $proxy = $proxies[$proxyKeys[$randKey]];
                    }
                }
                
                $innerPageContent = get_content($post->parseUrl, 'mobile', NULL, $proxy);
            } while (!$innerPageContent);

            $result = getParseInnerResult($innerPageContent); 
            
            if($result) {
                $result['link'] = $post->parseUrl;
                $result['description'] = $post->description;
                $result['currentAnnouce'] = $post->currentAnnounce;
                if($result['phone'] != '') {
                    $_SESSION['parse_result'][$post->currentAnnounce] = $result;
                }                
            }
        
            $result['stop_status'] = 'false';
        }

        echo json_encode($result);        
        
    } else {
        echo 'Ошибка запроса, не передеаны идентификаторы запрашиваемой страницы';
    }
}

if($route->action == 'getParseResultExcel') {
    
    include (VENDOR.'PHPExcel.php');
    $translit = new Transliteration();
    
    $setting = $_SESSION['current_setting'];
    $settingName = $translit->run($setting['settingName'], 'URL');
    
    $XlsxFilename = $settingName.'.xlsx';
    $XlsxFilePathName = FILES.$XlsxFilename;
    
    if(file_exists($XlsxFilePathName)) {
        unlink($XlsxFilePathName);
    }
    
    $objPHPExcel = new PHPExcel();
    $page = $objPHPExcel->setActiveSheetIndex(0);
    $page->setCellValue("A1", "ID");
    $page->setCellValue("B1", "MODEL");
    $page->setCellValue("C1", "PRICE");
    $page->setCellValue("D1", "SELLER_NAME");
    $page->setCellValue("E1", "SELLER_TYPE");
    $page->setCellValue("F1", "PHONE");
    $page->setCellValue("G1", "LINK");
    
    foreach($_SESSION['parse_result'] as $id => $row) {
        
        $description = trim($row['description']);     //MODEL
        $price = trim($row['price']);           //PRICE
        $sellerName = trim($row['sellerName']);      //SELLER_NAME
        $sellerType = trim($row['sellerType']);      //SELLER_TYPE
        $phone = trim($row['phone']);           //PHONE
        $link = 'https://avito.ru'.trim($row['link']);//LINK
        
        $obj = [
            $id,              //ID
            $description,     //MODEL
            $price,           //PRICE
            $sellerName,      //SELLER_NAME
            $sellerType,      //SELLER_TYPE
            $phone,           //PHONE
            $link             //LINK
        ];
        
        $objPHPExcel->getActiveSheet(0)->fromArray($obj, NULL, 'A' . ($id + 1));
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
        $objWriter->save($XlsxFilePathName);        
    }   
    
    $result['filename'] = $XlsxFilename;
    $result['button'] = ToHTML::inputButton('getFileResult', 'Получить файл', 'button', 'btn btn-success', 'data-filename="'.$XlsxFilename.'"');
    
    echo json_encode($result);
    unset($_SESSION['parse_result']);
}