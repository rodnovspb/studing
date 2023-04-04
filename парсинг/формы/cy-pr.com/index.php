<?php
require_once '../../show.php';
require_once '../../vendor/autoload.php';

use DiDom\Document;

ini_set('max_execution_time', '10000');
set_time_limit(0);
ini_set('memory_limit', '2048M');
ignore_user_abort(true);



$curl = curl_init('https://www.cy-pr.com/a/www.w3schools.com');
curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$html = curl_exec($curl);

$document = new Document($html);

$tic = $document->first('td[colspan=4] .htips.greymsg')->text();
preg_match('#(\d+)#', $document->find('.lt')[2]->text(), $match1);


preg_match('#(\d+)#', $tic, $match2);

echo "PR - $match1[1]";
echo "<br>";
echo "ТИЦ - $match2[1]";




