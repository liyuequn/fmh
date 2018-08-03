<?php
/**
 * Created by PhpStorm.
 * User: liyuequn
 * Date: 2018/8/3
 * Time: 下午5:25
 */
namespace App\Http;

use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Request;

class ArticleController extends Controller
{
    public function index()
    {
        $this->render('article/index');
    }

    public function change(Request $request)
    {
        $client = new Client();
        $crawler = $client->request('GET', $request->input('wechat_url'));
        $content = $crawler->filter('html')->html();
        $content = str_replace('data-src="','src=/image?url=',$content);
        echo $content;
    }
}