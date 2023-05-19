<?php

$router = new AltoRouter;

$router->map('GET','/','App\controllers\IndexController@show','home');
$router->map('GET','/featured','App\controllers\IndexController@featuredProducts','feature_product');
$router->map('GET','/get-products','App\controllers\IndexController@getProducts','get_product');
$router->map('POST', '/load-more', 'App\controllers\IndexController@loadMoreProducts', 'load_more_product');

$router->map('GET','/product/[i:id]','App\controllers\ProductController@show','products');
$router->map('GET','/product-details/[i:id]','App\controllers\ProductController@get','products_details');

// echo "hello";

$router->map('GET', '/products', 'App\controllers\ProductController@showAll', 'product');



$router->map('GET','/products/category/[*:slug]?/[*:subcategory]?',
    'App\controllers\CategoryController@show','products_category');
$router->map('POST','/products/category/load-more',
    'App\controllers\CategoryController@loadMoreProducts','load_more_products_category');


require_once __DIR__ . '/cart.php';

require_once __DIR__ . '/auth.php';
require_once __DIR__ . '/admin_routes.php';