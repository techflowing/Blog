<?php

namespace App\Http\Controllers;

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

        return view('xmind.index')
            ->with('projects', $project)
            ->with('navMenu', HomeNavMenu::getNavMenu());
    }
}
