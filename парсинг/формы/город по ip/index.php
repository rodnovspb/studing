<?php

use function Symfony\Component\String\s;

require_once '../../show.php';
require_once '../../vendor/autoload.php';

$token = "3a3164b3b82f2d86aa1ff7625eef3eeb3ba4202e";
$secret = "8eefefbeddf3678c71d5d9d4749d617510d4cb32";
$dadata = new \Dadata\DadataClient($token, $secret);

$result = $dadata->iplocate("46.226.227.20");

$ip = $_SERVER['REMOTE_ADDR'];

?>

<script>
    function getIPFromAmazon() {
		fetch("https://checkip.amazonaws.com/", { mode: "cors" }).then(res => res.text()).then(data => console.log(data))
	}

	getIPFromAmazon()
 
</script>





