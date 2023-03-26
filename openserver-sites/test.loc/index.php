<?php
require_once 'show.php';

require_once './vendor/autoload.php';
use DiDom\Document;




function normalize($target, $path){
    preg_match('#(http://[^/]+)/?#', $target, $match);
    $domain = $match[1];

    if(str_starts_with($path, 'http')){
        return $path;
    } elseif (str_starts_with($path, '../')){
        preg_match_all('#\.\.\/#', $path, $match);
        $count = count($match[0]);
        for ($i = 0; $i < $count; $i++){
            $path = preg_replace('#^\.\.\/#', '', $path);
            $target = preg_replace('#[^\/]+\/$#', '', $target);
        }
        $res = $target . $path;
        return $res;
    } elseif ($path === '/'){
        return $domain . '/';
    } elseif (preg_match('#^/#', $path)){
        $res = $domain . $path;
        return $res;
    } /*elseif (preg_match('#^\w+#', $path) || preg_match('#^\.\/#', $path)){*/
        elseif (preg_match('#^(\w+|\.\/{1})#', $path)){
        $path = preg_replace('#^\.\/#', '',$path);
        $res = $target . $path;
        return $res;
    }


}



foreach ($tests as $key => $test) {
    $norm = normalize($test['targ'], $test['path']);

    if ($norm === $test['norm']) {
        echo "
				<p style=\"color: green\">
					тест $key пройден
				</p>
			";
    } else {
        echo "
				<p style=\"color: red\">
					тест $key не пройден<br>
					ожидалось: '{$test['norm']}'<br>
					получено: $norm
				</p>
			";
    }
}




