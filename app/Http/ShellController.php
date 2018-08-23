<?php
/**
 * Created by PhpStorm.
 * User: liyuequn
 * Date: 2018/8/23
 * Time: 下午9:19
 */

namespace App\Http;


use Symfony\Component\HttpFoundation\Request;

class ShellController extends Controller
{
    public function index()
    {
        $this->render('shell/index');
    }

    public function exec(Request $request)
    {
        $shell = $request->get('shell');
        echo '<pre>';
        system($shell);

        echo '<a href="/update">更新</a>';

    }

    public function update()
    {
        echo '<pre>';

        echo shell_exec("./update.sh");
    }
}