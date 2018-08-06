<?php
/**
 * Created by PhpStorm.
 * User: liyuequn
 * Date: 2018/8/6
 * Time: 上午12:05
 */

namespace Frame;


use Frame\Route\Route;

class Dispatch
{
    protected $controllerName;
    protected $actionName;
    protected $router;
    protected $method;
    protected $requestUrl;

    public function __construct(Route $route,Request $request)
    {
        $this->router = $route;
        $this->request = $request;
    }

    public function dispatch($method,$route)
    {
        $this->method = $method;
        $this->requestUrl = $route;
        $this->getRoute();
        return $this->run();

    }

    protected function getRoute()
    {
        $routes = $this->router->getRoutes();
        $this->router->checkRoute($this->method,$this->requestUrl);
        $this->controllerName = $routes[$this->method][$this->requestUrl]['controller'];
        $this->actionName = $routes[$this->method][$this->requestUrl]['action'];
    }

    public function run()
    {
        $namespace = 'App\Http\\';
        $controllerName = $namespace.$this->controllerName;
        $actionName = $this->actionName;
        $controller = new $controllerName();

        return $controller->$actionName($this->request);
    }


}