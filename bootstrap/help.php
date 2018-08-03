<?php
/**
 * Created by PhpStorm.
 * User: liyuequn
 * Date: 2018/4/26
 * Time: 下午2:13
 */

function getConf($field){

    $config = require APP_PATH . "app/config.php";

    return $config[$field];

}

function dd($input){
    echo '<pre>';
    var_dump($input);
    exit;
}

