<?php


namespace App\Http\Controllers\Admin\Wiki;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use SmartWiki\Models\Member;

class WikiBaseController extends Controller
{
    /**
     * @var array 输出的数据
     */
    protected $data = array();
    /**
     * @var \Illuminate\Http\Request 请求对象
     */
    protected $request;
    /**
     * @var Response 响应
     */
    protected $response;

    public function __construct(Request $request)
    {
        $this->request = $request;
        $this->response = response();
    }

    /**
     * 判断是否是POST请求
     * @return bool
     */
    protected function isPost()
    {
        return strcasecmp($this->request->getMethod(), 'post') === 0;
    }

    /**
     * 判断是否是GET请求
     * @return bool
     */
    protected function isGet()
    {
        return strcasecmp($this->request->getMethod(), 'get') === 0;
    }

    /**
     * 输出 Json 信息
     * @param $data
     * @return \Illuminate\Http\JsonResponse
     */
    protected function jsonResult($errcode, $data = null, $message = null)
    {

        $message = empty($message) ? config('errors.' . $errcode) : $message;

        $content = ['errcode' => $errcode, 'message' => $message];
        if (empty($data) === false) {
            $content['data'] = $data;
        }

        $this->response = $this->response->json($content)
            ->header('Pragma', 'no-cache')
            ->header('Cache-Control', 'no-store, no-cache, must-revalidate, post-check=0, pre-check=0');
        return $this->response;
    }
}
