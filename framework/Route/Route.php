<?php
/**
 * Created by PhpStorm.
 * User: liyuequn
 * Date: 2018/8/5
 * Time: 下午11:24
 */

namespace Frame\Route;

class Route
{
    protected $routes;

    public function __construct()
    {

    }

    public function getRoutes()
    {
        return $this->routes;
    }

    public function get($uri,$param)
    {

        if(!strstr($param,'@'))
            throw new \Exception('invalid route');

        $params = explode('@',$param);
        if($uri!='/')
            $uri = trim($uri,'/');
        $this->routes['get'][$uri]['controller'] = $params[0];
        $this->routes['get'][$uri]['action'] = $params[1];
        $this->routes['get'][$uri]['url'] = $uri;

    }
    public function post($uri,$param)
    {
        if(!strstr($param,'@'))
            throw new \Exception('invalid route');

        $params = explode('@',$param);
        $this->routes['post'][$uri]['controller'] = $params[0];
        $this->routes['post'][$uri]['action'] = $params[1];
        $this->routes['post'][$uri]['url'] = $uri;

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