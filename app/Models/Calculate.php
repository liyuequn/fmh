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

        protected $targetArr;
        protected $target;

        /**
         * 1.可重复利用
         * 2.排序找到比目标小的数字
         * 3.1-4个数字之和
         */

        public function __construct($target)
        {
            $this->target = $target;
            $this->targetArr = $this->target($target);
        }

        public  function target($target = 0)
        {
            $target = $target?:$this->target;
            $targetArr = [];
            $numbers = self::PRICES;
            foreach ($numbers as $number )
            {
                if($target >= $number)
                {
                    $targetArr[] = $number;
                }
            }
            return $targetArr;

        }

        public function one($target)
        {
            if(in_array($target,$this->target()))
                return $target;
        }

        public  function two($target)
        {
            $targetArr = $this->target();
            foreach ($targetArr as $number)
            {
                $number2 = $target-$number;
                if(in_array($number2,$targetArr))
                {
                    $this->check($number,$number2);
                    return "$number+$number2";
                }

            }

        }
        public  function twoRest($target)
        {
            $targetArr = $this->target();
            $twoArr = [];
            foreach ($targetArr as $number)
            {
                $number2 = $target-$number;
                if(!in_array($number2,$targetArr))
                {
                    $twoArr[$number] = $number2;
                }

            }
            return $twoArr;

        }


        public function three($target)
        {
            $twoRest = $this->twoRest($target);
            foreach ($twoRest as $key => $rest)
            {
                $targetArr = $this->target($rest);
                foreach ($targetArr as $number)
                {
                    $number2 = $rest - $number;
                    if(in_array($number2,$targetArr))
                    {
                        $this->check($key,$number,$number2);
                        return $key.'+'.$number.'+'.$number2;
                    }

                }
            }

        }

        public function getResult()
        {
            $target = $this->target;
            $adds[] = $this->one($target);
            $adds[] = $this->two($target);
            $adds[] = $this->three($target);
            return $adds;
        }

        public function check(...$args)
        {
            foreach ($args as $x) {
                if(!in_array($x,self::PRICES))
                {
                    throw new \Exception(json_encode($args));
                }
            }
        }
}