<?php

namespace App\Http\Controllers;

use App\Http\ErrorDesc;
use App\Model\Admin\HomeNavMenu;
use App\Model\Event\Event;
use App\Model\XMind\XMind;
use App\Util\StatisticUtil;
use Encore\Admin\Facades\Admin;

/**
 * 思维导图相关控制器
 * Class XMindController
 * @package App\Http\Controllers
 */
class XMindController extends BaseController
{

    /**
     * 首页数据
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        StatisticUtil::recordVisitorEvent(Event::$SCENE_MAIN_PAGE, Event::$LOCATION_XMIND);

        $project = null;

        if (Admin::user() != null && Admin::user()->isAdministrator()) {
            // 登录账户显示所有文档，包含隐私文档
            $project = XMind::orderBy('updated_at', 'DESC')->get();
        } else {
            $project = XMind::where('type', '=', XMind::$TYPE_PUBLIC)
                ->orderBy('updated_at', 'DESC')
                ->get();
        }

        $current = null;
        if (!empty($project)) {
            $current = $project->first();
        }

        return view('xmind.index')
            ->with('projects', $project)
            ->with('current', $current)
            ->with('navMenu', HomeNavMenu::getNavMenu());
    }

    /**
     * 获取指定文档内容
     * @param $name string 思维导图名称
     * @return \Illuminate\Http\Response
     */
    public function getContent($name)
    {
        if (empty($name)) {
            abort(404);
        }
        $project = XMind::where('name', '=', $name)->first();
        if (empty($project)) {
            abort(404);
        }
        if ($project->type == XMind::$TYPE_PRIVATE && (Admin::user() == null || !Admin::user()->isAdministrator())) {
            abort(403);
        }
        $data['content'] = $project->content != null ? $project->content : "";
        return $this->buildResponse(ErrorDesc::SUCCESS, $data);
    }
}
