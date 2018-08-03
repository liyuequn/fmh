<?php
/**
 * Created by PhpStorm.
 * User: liyuequn
 * Date: 2018/8/3
 * Time: 下午5:11
 */


//1.基础函数
require APPPATH . 'bootstrap/help.php';
//2.Autoload 自动载入
require APPPATH.'vendor/autoload.php';
//3.路由分发
require APPPATH . 'bootstrap/dispatch.php';

require APPPATH."config/eloquent.php";