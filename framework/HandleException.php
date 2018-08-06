<?php
/**
 * Created by PhpStorm.
 * User: liyuequn
 * Date: 2018/8/6
 * Time: 下午1:02
 */

namespace Frame;

use Exception;

class HandleException
{

    protected $app;

    public function __construct()
    {
        error_reporting(-1);

        set_error_handler([$this, 'handleError']);

        set_exception_handler([$this, 'handleException']);

        register_shutdown_function([$this, 'handleShutdown']);

    }


    public function handleError()
    {


    }

    public function handleShutdown()
    {


    }

    public function handleException($e)
    {
        dd($e->getMessage());

    }
}