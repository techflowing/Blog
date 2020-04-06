<?php

namespace App\Http\Controllers;

use App\Http\ErrorDesc;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

/**
 * 控制器基类
 * Class BaseController
 * @package App\Http\Controllers
 */
class BaseController extends Controller
{
    /**
     * @var array 数据对象
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

    /**
     * BaseController constructor.
     * @param Request $request
     */
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
     * 构建请求返回数据
     * @param ErrorDesc $errorDesc 错误码信息
     * @param null $data 数据
     * @return Response
     */
    protected function buildResponse(ErrorDesc $errorDesc, $data = null)
    {
        $content = ['errCode' => $errorDesc[0], 'msg' => $errorDesc[1]];
        if (!empty($data)) {
            $content['data'] = $data;
        }
        $this->response->json($content);

        return $this->response;
    }
}
