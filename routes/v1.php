<?php
$router->get('getCategory','Api\v1\CategoryController@index');
$router->group(['prefix'=>'product'],function () use ($router){
    $router->get('new','Api\v1\ProductController@getProductNew');
    $router->get('category','Api\v1\ProductController@getProductwithCategory');
    $router->get('detail/{link}','Api\v1\DetailController@index');

});
$router->get('/search','Api\v1\SearchController@index');
$router->get('{slug}','Api\v1\CategoryController@getProduct');

