<?php

namespace App\Http\Controllers;

use App\Http\ErrorDesc;
use App\Model\Admin\HomeNavMenu;
use App\Model\Event\Event;
use App\Model\Wiki\WikiDocument;
use App\Model\Wiki\WikiProject;
use App\Util\StatisticUtil;
use Encore\Admin\Facades\Admin;

/**
 * Wiki 相关控制器
 * Class WikiController
 * @package App\Http\Controllers
 */
class WikiController extends BaseController
{
    /**
     * Wiki 首页, 显示项目列表
     */
    public function index()
    {
        StatisticUtil::recordVisitorEvent(Event::$SCENE_MAIN_PAGE, Event::$LOCATION_WIKI);

        $project = null;

        if (Admin::user() != null && Admin::user()->isAdministrator()) {
            // 登录账户显示所有文档，包含隐私文档
            $project = WikiProject::orderBy('updated_at', 'DESC')->get();
        } else {
            $project = WikiProject::where('type', '=', WikiProject::$TYPE_PUBLIC)
                ->orderBy('updated_at', 'DESC')
                ->get();
        }

        return view('wiki.index')
            ->with('projects', $project)
            ->with('navMenu', HomeNavMenu::getNavMenu());
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
        if ($wikiProject->type == WikiProject::$TYPE_PRIVATE && (Admin::user() == null || !Admin::user()->isAdministrator())) {
            abort(403);
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

    /**
     * 展示文档详情
     * @param integer $projectId 项目ID
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function detail($projectId)
    {
        if (empty($projectId) || $projectId <= 0) {
            abort(404);
        }
        $project = WikiProject::where('id', '=', $projectId)
            ->first();
        if (empty($project)) {
            abort(404);
        }
        if ($project->type == WikiProject::$TYPE_PRIVATE && (Admin::user() == null || !Admin::user()->isAdministrator())) {
            abort(403);
        }
        $navMenu = HomeNavMenu::all()
            ->sortBy('order');

        $catalog = WikiDocument::getDocumentCatalog($project->id);

        return view('wiki.detail.index')
            ->with('navMenu', $navMenu)
            ->with('wiki_project', $project)
            ->with('doc_catalog', json_encode($catalog, JSON_UNESCAPED_UNICODE))
            ->with('project_id', $project->id);
    }
}
