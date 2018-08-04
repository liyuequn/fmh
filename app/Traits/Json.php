<?php
/**
 * Created by PhpStorm.
 * User: liyuequn
 * Date: 2018/8/3
 * Time: 下午8:21
 */

namespace App\Traits;

use App\Models\Constant;

Trait Json
{
    public function json($response = '',$code = Constant::RESPONSE_SUCCESS,$message = '')
    {
        $time = microtime() - FMH_START_TIME;
        $result = [
            'code' => $code,
            'time' => round($time,3),
            'result' => $response,
            'message' => $message
        ];
        return json_encode($result);
    }
}