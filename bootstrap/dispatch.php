<?php
/**
 * Created by PhpStorm.
 * User: liyuequn
 * Date: 2018/8/3
 * Time: 下午5:32
 */
define('FMH_START_TIME',microtime());
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Frame\Dispatch;

$request = new \Frame\Request();
$route = $request->getRoute();
$dispatch = new Dispatch($router);
$result = $dispatch->dispatch($request->method,$route);

$response = new Response($result,200);

$response->send();