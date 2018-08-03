<?php
/**
 * Created by PhpStorm.
 * User: liyuequn
 * Date: 2018/8/3
 * Time: 下午5:32
 */

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

$routes = require APP_PATH . 'route/web.php';

$namespace = 'App\Http\\';

$request = Request::createFromGlobals();
$request_url = $request->getPathInfo();
if($request_url!='/')$request_url = trim($request_url,'/');

$controllerName = $namespace.$routes[$request_url]['controller'];

$controller = new $controllerName ();

$action = $routes[$request_url]['action'];

$response = new Response(htmlspecialchars($controller->$action($request), ENT_QUOTES, 'UTF-8'));

$response->send();