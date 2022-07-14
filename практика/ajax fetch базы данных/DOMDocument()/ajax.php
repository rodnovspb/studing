<?php

if(isset($_REQUEST['artist'])){
    $artist = $_REQUEST['artist'];


    $xmlDoc = new DOMDocument();
    $xmlDoc->load('cd_catalog.xml');
    $artists = $xmlDoc->getElementsByTagName('ARTIST');

    for($i=0; $i < $artists->length; $i++){
        if($artists->item($i)->nodeType == 1) {
            if ($artists->item($i)->childNodes->item(0)->nodeValue == $artist) {
                $parent = ($artists->item($i)->parentNode);
            }
        }
        }

        $children = ($parent->childNodes);

        for($i=0; $i < $children->length; $i++){
            if($children->item($i)->nodeType == 1){
                echo "<b>" . $children->item($i)->nodeName . ": </b>";
                echo $children->item($i)->childNodes->item(0)->nodeValue;
                echo "<br>";
            }
        }
}