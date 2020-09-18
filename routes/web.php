<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

//$router->get('/', function () use ($router) {
//    return $router->app->version();
//});
//$router->get('/{slug}-p{id:[0-9]+}.html', function($slug,$id){
//    return [$slug,$id];
//});
$router->get('errors','HomeController@errors_404');
$router->get('cart','HomeController@cart');
$router->get('logout','HomeController@logout');
$router->get('/redirect', 'AuthController@redirectToProvider');
$router->get('/callback', 'AuthController@handleProviderCallback');
$router->get('login','AuthController@login');
$router->get('/{slug}-p{id:[0-9]+}.html', ['as' => 'product', 'uses' => 'ProductController@index']);
//Route::get('/{detail}-p{id:[0-9]*}.html','ProductController@index');
$router->get('/','HomeController@index');
$router->get('chi-tiet-san-pham','TestController@viewDetailProduct');
$router->get('search','HomeController@viewSearch');
$router->get('category','TestController@viewCategory');
//$router->prefix('ajax')->group(function (){
//    $router->post('filterproduct','HomeController@filterProductwithCategory');
//});
$router->group(['prefix' => 'ajax'], function () use ($router) {
    $router->post('filterproduct', 'HomeController@filterProductwithCategory');
//    $router->post('filterproduct', function (){return 123;});
    $router->post('getproduct', 'CategoryController@filterAllProductwithCategory');
    $router->post('addcart','ProductController@addcart');
    $router->post('delete','HomeController@deletecart');
    $router->post('update','HomeController@update');
});
$router->get('/{slug}','CategoryController@index');
$router->group(['prefix' => 'api'],function () use ($router){
//    $router->get('getCategory/{name}','Api\CategoryController@index');
    $router->group(['prefix'=>'v1'],function () use ($router){
       require_once 'v1.php';
    });
});

