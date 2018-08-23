<?php
/**
 * Created by PhpStorm.
 * User: liyuequn
 * Date: 2018/8/5
 * Time: 下午11:24
 */

namespace Frame;

class Router
{
    protected $routes;

    public function __construct()
    {

    }

    public function init(\Closure $closure)
    {
        return call_user_func($closure,[]);
    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function get($uri,$param)
    {

        $this->addRoute('get',$uri,$param);


    }
    public function post($uri,$param)
    {
        $this->addRoute('post',$uri,$param);

    }

    public function addRoute($method,$uri,$param)
    {
        if(!strstr($param,'@'))
            throw new \Exception('invalid route');

        $params = explode('@',$param);
        $this->routes[$method][$uri]['controller'] = $params[0];
        $this->routes[$method][$uri]['action'] = $params[1];
        $this->routes[$method][$uri]['url'] = $uri;
    }

    public function checkRoute($method,$route)
    {
        $routes = $this->routes[$method];

        if(array_key_exists($route,$routes)){
            return $route;
        }else{
            throw new \Exception(" invalid request $route");
        }

    }
}