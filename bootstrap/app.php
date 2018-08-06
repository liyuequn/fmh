<?php
/**
 * Created by PhpStorm.
 * User: liyuequn
 * Date: 2018/8/3
 * Time: 下午5:11
 */

error_reporting('E_ALL ~E_NOTICE');
//1.基础函数
require APP_PATH . 'bootstrap/helps.php';
//2.Autoload 自动载入
require APP_PATH.'vendor/autoload.php';
//3.数据库
require APP_PATH."config/eloquent.php";
//4.路由
require APP_PATH."route/web.php";
//5.分发


define('FMH_START_TIME',microtime());

use Symfony\Component\HttpFoundation\Response;
use Frame\Dispatch;
use Frame\Request;
use Frame\HandleException;


$exception = new HandleException();

$request = Request::capture();

$dispatch = new Dispatch($router,$request);

$result = $dispatch->dispatch($request->getMethod(),$request->getRoute());


$response = new Response($result,200);

$response->send();