<?php
	use \Core\Route;

	return [
		new Route('/goods/:id/', 'goods', 'one'),
		new Route('/goods-all/', 'goods', 'all'),
		new Route('/get-one/:id', 'page', 'one'),
		new Route('/get-all/', 'page', 'all'),
		new Route('/my-page1/', 'page', 'show1'),
		new Route('/my-page2/', 'page', 'show2'),
		new Route('/page2/:id/', 'page', 'show'),
		new Route('/page-model/', 'page', 'test'),
		new Route('/page/:id/', 'page', 'show1'),
        new Route('/my-page3/', 'test', 'act1'),
        new Route('/my-page4/', 'test', 'act2'),
        new Route('/my-page5/', 'test', 'act3'),
        new Route('/test/index/', 'test', 'act'),
        new Route('/test/:var1/:var2/', 'page', 'act'),
        new Route('/nums/:n1/:n2/:n3/', 'num', 'sum'),
        new Route('/user/all/', 'user', 'all'),
        new Route('/user/first/:n/', 'user', 'first'),
        new Route('/user/:id/', 'user', 'show'),
        new Route('/user/:id/:key/', 'user', 'info'),
        new Route('/act/', 'page', 'act'),
        new Route('/products/all/', 'product', 'showAll'),
        new Route('/product/:n/', 'product', 'show'),


	];

