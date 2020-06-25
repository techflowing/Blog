<?php

namespace App\Http\Controllers;

use App\Model\Admin\HomeNavMenu;
use App\Model\Event\Event;
use App\Util\StatisticUtil;

/**
 * 留言板
 * Class GuestBookController
 * @package App\Http\Controllers
 */
class GuestBookController extends BaseController
{
    /**
     * 首页
     */
    public function index()
    {
        StatisticUtil::recordVisitorEvent(Event::$SCENE_MAIN_PAGE, Event::$LOCATION_GUEST_BOOK);

        return view('guestbook.index')
            ->with('navMenu', HomeNavMenu::getNavMenu());
    }
}
