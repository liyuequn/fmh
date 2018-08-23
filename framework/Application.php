<?php
/**
 * Created by PhpStorm.
 * User: liyuequn
 * Date: 2018/8/6
 * Time: 下午1:03
 */

namespace Frame;


class Application extends Container
{
    protected $startTime;

    protected $endTime;

    protected $router;

    protected $dispatch;

    protected $middleware;

    protected $request;

    protected $response;

    public function __construct()
    {
        $this->registerBaseBindings();
    }

    protected function registerBaseBindings()
    {
        static::setInstance($this);

        $this->bind('app',$this);
        $this->bind('router',new Router());

    }


    public function run()
    {

    }

    public function getRequest()
    {

    }


}