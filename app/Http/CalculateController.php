<?php
/**
 * Created by PhpStorm.
 * User: liyuequn
 * Date: 2018/8/4
 * Time: 上午3:51
 */

namespace App\Http;


use App\Models\Calculate;
use App\Models\Constant;
use Symfony\Component\HttpFoundation\Request;

class CalculateController extends Controller
{
    public function index(Request $request)
    {
         $this->render('calculate/index');
    }
    public function getResult(Request $request)
    {
        try{
            $target = $request->get('num');
            $calculate = new Calculate($target);
            $result = [$calculate->getResult()];

            return $this->json($result,Constant::RESPONSE_SUCCESS,'计算成功');
        }catch (\Exception $e)
        {
            return $this->json('',Constant::FAILED_SUCCESS,$e->getMessage());

        }
    }
}