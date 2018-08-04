<?php
/**
 * Created by PhpStorm.
 * User: liyuequn
 * Date: 2018/8/3
 * Time: 下午5:25
 */
namespace App\Http;

use App\Traits;

require_once APP_PATH.'vendor/autoload.php';

class Controller
{
    use Traits\Render,Traits\Json;

}