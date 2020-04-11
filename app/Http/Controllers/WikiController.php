<?php

namespace App\Http\Controllers;

use App\Http\ErrorDesc;
use App\Model\Admin\HomeNavMenu;
use App\Model\wiki\WikiDocument;
use App\Model\wiki\WikiProject;
use Encore\Admin\Facades\Admin;

/**
 * Wiki 相关控制器
 * Class WikiController
 * @package App\Http\Controllers
 */
class WikiController extends BaseController
{
    /**
     * Wiki 首页
     */
    public function index()
    {
        $project = null;

        if (Admin::user() != null && Admin::user()->isAdministrator()) {
            // 登录账户显示所有文档，包含隐私文档
            $project = WikiProject::all()
                ->sortBy('updated_at');
        } else {
            $project = WikiProject::where('type', '=', WikiProject::$TYPE_PUBLIC)
                ->orderBy('updated_at')
                ->get();
        }

        $navMenu = HomeNavMenu::all()
            ->sortBy('order');

        return view('wiki.index')
            ->with('projects', $project)
            ->with('navMenu', $navMenu);
    }

    /**
     * 获取指定文档内容
     * @param integer $projectId 项目ID
     * @param integer $docId 文档ID
     * @return \Illuminate\Http\Response
     */
    public function getContent($projectId, $docId)
    {
        if (empty($docId) || $docId <= 0) {
            abort(404);
        }
        $wikiProject = WikiProject::find($projectId);
        if (empty($wikiProject)) {
            abort(404);
        }
        $document = WikiDocument::where('project_id', '=', $projectId)
            ->where('id', '=', $docId)
            ->first();
        if (empty($document)) {
            abort(404);
        }
        $data['content'] = $document->content != null ? $document->content : "";
        return $this->buildResponse(ErrorDesc::SUCCESS, $data);
    }
}
