<?php
/**
 * Created by PhpStorm.
 * User: liyuequn
 * Date: 2018/8/3
 * Time: 下午5:25
 */
namespace App\Http;

use App\Models\BaseModel;
use GuzzleHttp\Client;
use Symfony\Component\HttpFoundation\Request;
use Exception;

class ArticleController extends Controller
{
    public function index()
    {
        return $this->render('article/index');
    }

    public function change(Request $request)
    {
        $client = new Client();
        $wechat_url = $request->get('wechat_url');
        if(!$wechat_url) throw new Exception('wechat_url can not be empty');

        $crawler = $client->request('GET', $wechat_url);
        $content = $crawler->getBody()->getContents();
        $content = str_replace('data-src="','src=/image?url=',$content);
        echo $content;
    }

    public function image(Request $request){
        $url = $request->get('url');

        if(!$url) throw new Exception('wechat_url can not be empty');
        header("content-type:image/jpeg");
        echo file_get_contents($url);
        die();
    }

    public function articles()
    {
        return BaseModel::find(1);
    }
}