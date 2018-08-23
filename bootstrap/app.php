<?php
/**
 * Created by PhpStorm.
 * User: liyuequn
 * Date: 2018/8/3
 * Time: 下午5:11
 */

//1.基础函数
require APP_PATH . 'bootstrap/helps.php';
//2.Autoload 自动载入
require APP_PATH.'vendor/autoload.php';

$app = new \Frame\Application();

dd($app->get('router')->init(function ($router){
    require APP_PATH.'route/web.php';
}));


