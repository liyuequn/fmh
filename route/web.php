<?php
/**
 * Created by PhpStorm.
 * User: liyuequn
 * Date: 2018/8/3
 * Time: 下午5:44
 */

return [
    '/'=>[
        'controller'=>'ArticleController',
        'action'=>'index',
    ],
    'change'=>[
        'controller'=>'ArticleController',
        'action'=>'change',
    ],
    'image'=>[
        'controller'=>'ArticleController',
        'action'=>'image',
    ],
    'articles'=>[
        'controller'=>'ArticleController',
        'action'=>'articles',
    ],
    'res'=>[
        'controller'=>'CalculateController',
        'action'=>'getResult',
        'type'=>['Content-Type' => 'Application/json']
    ],
    'calculate'=>[
        'controller'=>'CalculateController',
        'action'=>'index',
    ],
    'update'=>[
        'controller'=>'ShellController',
        'action'=>'index',
    ],
    'exec'=>[
        'controller'=>'ShellController',
        'action'=>'exec',
    ],

];