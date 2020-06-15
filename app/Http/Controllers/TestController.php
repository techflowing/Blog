<?php


namespace App\Http\Controllers;


use App\Model\Admin\HomeNavMenu;
use App\Util\StatisticUtil;

class TestController extends Controller
{
    public function index()
    {

        StatisticUtil::recordVisitorEvent("scene", "location");

        $navMenu = HomeNavMenu::all()
            ->sortBy('order');

        return view('sample.home')
            ->with('navMenu', $navMenu);
    }

    public function share()
    {
        $imgUrl = request('imgUrl');
        $iconUrl = request('iconUrl');
        $type = request('type');
        $title = request('title');
        $name = request('name');
        $scheme = urldecode(request('scheme'));


        return view('test.share.index')
            ->with('imgUrl', $imgUrl)
            ->with('iconUrl', $iconUrl)
            ->with('type', $type)
            ->with('title', $title)
            ->with('name', $name)
            ->with('scheme', $scheme);
    }
}
