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
//3.数据库
require APP_PATH."config/eloquent.php";
//4.路由
require APP_PATH."route/web.php";
//5.分发
require APP_PATH . 'bootstrap/dispatch.php';