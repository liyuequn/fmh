<?php
/**
 * Created by PhpStorm.
 * User: liyuequn
 * Date: 2018/8/3
 * Time: 下午8:21
 */

namespace App\Traits;

Trait Render
{
    public function render($templateFile,array $variables = [])
    {


        $templatePath = APP_PATH.'app/View';

        $loader = new \Twig_Loader_Filesystem($templatePath);

        $twig = new \Twig_Environment($loader, array(
//            'cache' => APP_PATH.'storage/viewCache',
            'debug'=> false,
        ));

        $templateFile = ucfirst($templateFile);

        $template = $twig->loadTemplate($templateFile.'.html');

        $template->display($variables);
    }
}