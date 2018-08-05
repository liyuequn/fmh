<?php
/**
 * Created by PhpStorm.
 * User: liyuequn
 * Date: 2018/8/3
 * Time: 下午5:44
 */
use Frame\Route\Route;

$router = new Route();
$router->get('/','ArticleController@index');
$router->post('article/change','ArticleController@change');

$router->get('calculate','CalculateController@index');
$router->post('res','CalculateController@getResult');