<?php
// AJAX

if($route->action == 'insertSettingsTable') {
    if($post->settingName AND $post->parseUrl AND $post->pagesCount AND $post->annoucementsCount AND $post->outputData) {
        $urlParams = preg_replace("/(https?:\/\/(?:www.)?[^.\/]*.[a-z]{2,5})/i", '', $post->parseUrl);
        $settings = [
            'settingName' => trim($post->settingName),
            'parseUrl' => $urlParams,
            'pagesCount' => trim($post->pagesCount),
            'annoucementsCount' => trim($post->annoucementsCount),
            'timeoutCount' => ($post->timeoutCount) ? trim($post->timeoutCount) : 0,
            'useProxy' => trim($post->useProxy),
            'outputData' => trim($post->outputData),
        ];
        $serialize = serialize($settings);
        if($post->settingId) {            
            $result = $data->updateSettingsTable($serialize, $post->settingId);
        } else {
            $result = $data->insertSettingsTable($serialize);
        }
        
        if($result) {
            $return['code'] = 2;
            if($post->settingId) {
                $return['report'] = 'Введенные настройки обновлены в наборе';
            } else {
                $return['report'] = 'Введенные настройки добавлены в набор';
            }            
        } else {
            $return['code'] = 4;
            $return['report'] = 'Ошибка добавления записи';
        }
        echo json_encode($return);
    } else {
        $return['code'] = 4;
        $return['report'] = 'Ошибка добавления записи';
        echo json_encode($return);
    }
}

if($route->action == 'loadSettingsTable') {
    $result = $data->loadSettingsTable();
    if ($result) {
        $counter = 0; $return = '';
        foreach($result as $res) {
            $counter++;            
            $row = unserialize($res['setting']);            
            $row['id'] = $res['id'];
            $row['counter'] = $counter;
            $return .= $view->loadView('settings_table', $row);            
        }
        echo $return;
    } else {
        echo $view->loadView('settings_warning', 'Данные настроек еще не внесены');
    }
}

if($route->action == 'deleteSettingsTable') {
    if($post->deleteId) {
        $data->deleteSettingsTable($post->deleteId);
    }
}

if($route->action == 'getForEditSettingsTable') {
    if($post->editId) {
        $result = $data->getForEditSettingsTable($post->editId);        
        echo json_encode(array_merge(['id' => $result['id']], unserialize($result['setting'])));
    }
}