<?php
	use \Core\Route;

	return [
		new Route('/my-page1/', 'page', 'show1'),
		new Route('/my-page2/', 'page', 'show2'),
		new Route('/page2/:id/', 'page', 'show'),
        new Route('/my-page3/', 'test', 'act1'),
        new Route('/my-page4/', 'test', 'act2'),
        new Route('/my-page5/', 'test', 'act3'),
        new Route('/test/:var1/:var2/', 'page', 'act'),
        new Route('/nums/:n1/:n2/:n3/', 'num', 'sum'),
        new Route('/user/all/', 'user', 'all'),
        new Route('/user/first/:n/', 'user', 'first'),
        new Route('/user/:id/', 'user', 'show'),
        new Route('/user/:id/:key/', 'user', 'info'),
        new Route('/act/', 'page', 'act'),


	];

