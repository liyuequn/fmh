<?php
/**
 * Created by PhpStorm.
 * User: liyuequn
 * Date: 2018/8/3
 * Time: 下午5:44
 */

$router->get('/','ArticleController@index');
$router->post('article/change','ArticleController@change');
$router->get('image','ArticleController@image');

$router->get('calculate','CalculateController@index');
$router->post('res','CalculateController@getResult');