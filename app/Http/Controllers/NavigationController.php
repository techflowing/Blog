<?php

namespace App\Http\Controllers;

use App\Model\Admin\HomeNavMenu;
use App\Model\Event\Event;
use App\Model\Navigation\Category;
use App\Util\StatisticUtil;

/**
 * 网址收藏
 * Class NavigationController
 * @package App\Http\Controllers
 */
class NavigationController extends Controller
{
    public function index()
    {
        StatisticUtil::recordVisitorEvent(Event::$SCENE_MAIN_PAGE, Event::$LOCATION_NAVIGATE);

        $categories = Category::with(
            ['children' => function ($query) {
                $query->orderBy('order');
            }, 'sites' => function ($query) {
                $query->orderBy('order');
            }])
            ->withCount('children')
            ->orderBy('order')
            ->get();
        $navMenu = HomeNavMenu::all()
            ->sortBy('order');

        return view('navigation.index')
            ->with('categories', $categories)
            ->with('navMenu', $navMenu);
    }
}
