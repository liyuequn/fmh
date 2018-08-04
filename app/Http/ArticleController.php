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

class ArticleController extends Controller
{
    public function index()
    {
        $this->render('article/index');
    }

    public function change(Request $request)
    {
        $client = new Client();
        $wechat_url = $request->get('wechat_url');
        $crawler = $client->request('GET', $wechat_url);
        $content = $crawler->getBody()->getContents();
        $content = str_replace('data-src="','src=/image?url=',$content);
        echo $content;
    }

    public function image(Request $request){
        $url = $request->get('url');
        header("content-type:image/jpeg");
        echo file_get_contents($url);
        die();
    }

    public function articles()
    {
        return BaseModel::find(1);
    }
}