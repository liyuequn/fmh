<?php
/**
 * Created by PhpStorm.
 * User: liyuequn
 * Date: 2018/8/3
 * Time: 下午8:21
 */

namespace APP\Traits;

Trait Render
{
    public function render($templateFile,array $variables = [])
    {


        $templatePath = APPPATH.'app/View';

        $loader = new \Twig_Loader_Filesystem($templatePath);

        $twig = new \Twig_Environment($loader, array(
//            'cache' => APPPATH.'storage/viewCache',
            'debug'=> false,
        ));

        $templateFile = ucfirst($templateFile);

        $template = $twig->loadTemplate($templateFile.'.html');

        $template->display($variables);
    }
}