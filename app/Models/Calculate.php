<?php
/**
 * Created by PhpStorm.
 * User: liyuequn
 * Date: 2018/8/4
 * Time: 上午3:41
 */

namespace App\Models;

class Calculate
{
        const PRICES = [
            10,128,380,150,120,230,118,290,390,188,110,108,350,280,130,118,
            30,50,80,500,400,300,200,100
        ];



        /**
         * 1.可重复利用
         * 2.排序找到比目标小的数字
         * 3.1-4个数字之和
         */

        public function __construct($target)
        {

            $this->target = $target;
        }

        public function getResult()
        {
            function get_shopping_list($arr,$sum){
                if(in_array($sum,$arr)){
                    return $sum;
                }
                rsort($arr);
                $count = count($arr);
                if($arr[$count-1]>$sum){
                    return 0;
                }
                $ing_sum = 0;
                $shopping_lenth=1;
                $need_num = 1;
                $shoping_str = '';
                while (true){
                    if($sum/$arr[$count-1]<$need_num){
                        break;
                    }
                    foreach ($arr as $k=>$v){
                        if($v>$sum){
                            continue;
                        }else{
                            $shopping_lenth = $need_num;
                            $shoping_str = $ing_sum = $v;
                            $slice_arr = array_slice($arr,$k);
                            while($shopping_lenth>0){
                                $next_num = get_number($slice_arr,$sum-$ing_sum,$shopping_lenth);
                                if($next_num){
                                    $ing_sum+=$next_num;
                                    $shopping_lenth--;
                                    $shoping_str .= "+".$next_num;
                                    if($ing_sum==$sum){
                                        return $shoping_str;
                                    }
                                }else{
                                    break;
                                }
                            }
                        }
                    }
                    $need_num++;
                }
                return 0;

            }

            function get_number($arr,$sum,$shopping_lenth){

                if(in_array($sum,$arr)){
                    return $sum;
                }
                if($shopping_lenth=='1'){
                    return false;
                }
                foreach ($arr as $k=>$v){
                    if($v>$sum){
                        continue;
                    }else{
                        return $v;
                    }
                }
                return false;
            }

            $res = get_shopping_list(self::PRICES,$this->target);

            return $res;
        }









}