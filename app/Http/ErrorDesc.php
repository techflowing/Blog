<?php

namespace App\Http;

/**
 * 网络请求错误码统一定义
 * 错误码格式：X-XX-XXXX，标识：类型-业务-错误信息
 * 类型值：
 *      1-网站前台请求，2-网站管理后台请求
 * 业务值：
 *      1-导航站
 *      2-Wiki
 */
class ErrorDesc
{
    // 成功
    const SUCCESS = [0, "OK"];

    // Wiki管理

}
