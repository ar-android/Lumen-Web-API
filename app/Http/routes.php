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

$app->get('/', function () use ($app) {
  $res['success'] = true;
  $res['result'] = "Hello there welcome to web api using lumen tutorial!";
  return response($res);
});

$app->post('/login', 'LoginController@index');
$app->post('/register', 'UserController@register');
$app->get('/user/{id}', ['middleware' => 'auth', 'uses' =>  'UserController@get_user']);
$app->post('/user/update', ['middleware' => 'auth', 'uses' =>  'UserController@update']);
$app->get('/user/avatar/{name}', 'UserController@get_avatar');

/*
 | ------------------------------------------
 | CRUD Routes using auth middleware
 | ------------------------------------------
 */

/* Route category ads */
$app->get('/category', 'CategoryAdsController@index');
$app->get('/category/{id}', 'CategoryAdsController@read');
$app->get('/category/delete/{id}', 'CategoryAdsController@delete');
$app->post('/category', 'CategoryAdsController@create');
$app->post('/category/update/{id}', 'CategoryAdsController@update');

/* Route item ads */
$app->get('/item_ads', 'ItemAdsController@index');
$app->get('/item_ads/{id}', 'ItemAdsController@read');
$app->get('/item_ads/delete/{id}', 'ItemAdsController@delete');
$app->post('/item_ads/create', 'ItemAdsController@create');
$app->post('/item_ads/update/{id}', 'ItemAdsController@update');
