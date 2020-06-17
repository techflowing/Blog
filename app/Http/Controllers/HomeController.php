<?php

namespace App\Http\Controllers;

use App\Model\Admin\HomeNavMenu;
use App\Model\Event\Event;
use App\Util\StatisticUtil;

class HomeController extends Controller
{
    public function index()
    {
        StatisticUtil::recordVisitorEvent(Event::$SCENE_MAIN_PAGE, Event::$LOCATION_WELCOME);

        return view('welcome.index')
            ->with('homeMenu', HomeNavMenu::getNavMenu());
    }
}
