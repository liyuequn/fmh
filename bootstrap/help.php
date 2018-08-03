<?php
/**
 * Created by PhpStorm.
 * User: liyuequn
 * Date: 2018/4/26
 * Time: 下午2:13
 */

function getConf($field){

    $config = require APPPATH . "app/config.php";

    return $config[$field];

}

function dd($input){
    echo '<pre>';
    var_dump($input);
    exit;
}

