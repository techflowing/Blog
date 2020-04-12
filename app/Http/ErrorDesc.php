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
    // 通用
    const SUCCESS = [0, "OK"];
    const DB_ERROR = [100, "DB 操作失败"];
    const REQUEST_BODY_EMPTY = [101, "请求Body为空"];
    const METHOD_NOT_ALLOWED = [405, "Method Not Allowed"];

    // Wiki管理
    const WIKI_NAME_EMPTY = [202001, "文档名称为空"];
    const WIKI_PARENT_DOC_EMPTY = [202002, "父级文档不存在"];
    const WIKI_PROJECT_NOT_EXIST = [202003, "Wiki 项目不存在"];
    const WIKI_PROJECT_PRIVATE = [202004, "Wiki 项目为私有项目，不允许公开访问"];
    const WIKI_DOC_NOT_EXIST = [202005, "Wiki Document 不存在"];

}
