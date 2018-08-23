<?php
/**
 * Created by PhpStorm.
 * User: liyuequn
 * Date: 2018/8/18
 * Time: 下午4:22
 */

namespace Frame;
use Frame\Interfaces\Container as ContainerInterface;

class Container implements ContainerInterface
{
    protected $bindings;

    protected $instances;

    protected static $instance;

    public static function getInstance()
    {
        if(is_null(static::$instance))
        {
            static::$instance = new static();
        }

        return static::$instance;
    }

    public static function setInstance(Container $container)
    {
        return static::$instance = $container;
    }

    /**
     * @param $abstract
     * @param null $concrete
     */
    public function bind($abstract,$concrete = null)
    {
        if($concrete instanceof \Closure)
        {
            $this->bindings[$abstract] = $concrete;
        } else {
            $this->instances[$abstract] = $concrete;
        }
    }

    /**
     * @param $abstract
     * @param array $parameters
     * @return mixed
     */
    public function make($abstract,array $parameters = [])
    {
        if(isset($this->instances[$abstract]))
        {
            return $this->instances[$abstract];
        }

        array_unshift($parameters, $this);

        return call_user_func_array($this->bindings[$abstract], $parameters);
    }

    public function bound($abstract)
    {
        return isset($this->bindings[$abstract]) ||
            isset($this->instances[$abstract]);
//            || $this->isAlias($abstract);
    }

    public function has($abstract)
    {
        return $this->bound($abstract);
    }

    public function get($abstract)
    {
        // TODO: Implement get() method.
        return $this->instances[$abstract];
    }



}