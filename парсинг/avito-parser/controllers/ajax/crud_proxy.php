<?php
// AJAX

if ($route->action == 'loadProxyTable') {
    $result = $data->loadProxyTable();
    if ($result) {
        $counter = 0; $return = '';
        foreach($result as $row) {
            $counter++;
            $row['counter'] = $counter;
            switch ($row['type']) {
                case CURLPROXY_SOCKS4:
                    $row['type'] = 'SOCKS4';
                    break;
                case CURLPROXY_SOCKS5:
                    $row['type'] = 'SOCKS5';
                    break;
                default:
                    $row['type'] = 'HTTP';
            }
            $return .= $view->loadView('proxy_table', $row);            
        }
        echo $return;
    } else {
        echo $view->loadView('proxy_warning', 'Данные прокси-серверов еще не внесены');
    }
}

if($route->action == 'insertProxyTable') {
    if($post->ipAdress AND $post->port) {
        $result = $data->insertProxyTable($post->ipAdress, $post->port, (string)$post->typeProxy);
        if($result) {
            $return['code'] = 2;
            $return['report'] = 'Прокси-сервер: '.$post->ipAdress.':'.$post->port.' - добавлен в набор';
        } else {
            $return['code'] = 4;
            $return['report'] = 'Ошибка добавления записи';
        }
        echo json_encode($return);
    }  
}

if($route->action == 'deleteProxyTable') {
    if($post->deleteId) {
        $data->deleteProxyTable($post->deleteId);
    }
}

