<?php
/**
 * Created by PhpStorm.
 * User: liyuequn
 * Date: 2018/8/6
 * Time: 上午1:11
 */

namespace Frame;
use Symfony\Component\HttpFoundation\Request as HttpRequest;

class Request
{
    protected $route;

    public $request;

    function __construct()
    {
        $this->request = HttpRequest::createFromGlobals();
        $this->method = strtolower($this->request->getMethod());
    }

    public function getRoute()
    {
        $route = $this->request->getRequestUri();
        if($route!='/')
            $route = trim($route,'/');
        return $route;
    }

}