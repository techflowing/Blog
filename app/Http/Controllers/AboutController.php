<?php

namespace App\Http\Controllers;

use App\Model\Admin\HomeNavMenu;
use App\Model\Event\Event;
use App\Model\Statistic\PV;
use App\Model\Statistic\UV;
use App\Util\StatisticUtil;
use phpDocumentor\Reflection\Types\Collection;
use phpDocumentor\Reflection\Types\Object_;
use stdClass;

/**
 * 关于 页面
 * Class AboutController
 * @package App\Http\Controllers
 */
class AboutController extends BaseController
{
    public function index()
    {
        return view('about.index')
            ->with('navMenu', HomeNavMenu::getNavMenu())
            ->with('accessData', $this->getAccessStatistic());
    }

    /**
     * 获取页面访问统计数据
     */
    private function getAccessStatistic()
    {
        $uv = UV::where('scene', '=', Event::$SCENE_MAIN_PAGE)
            ->get();
        $pv = PV::where('scene', '=', Event::$SCENE_MAIN_PAGE)
            ->get();
        return array(
            $this->findAccessData(Event::$LOCATION_WELCOME, "首页", $pv, $uv),
            $this->findAccessData(Event::$LOCATION_BLOG, "博客", $pv, $uv),
            $this->findAccessData(Event::$LOCATION_WIKI, "知识库", $pv, $uv),
            $this->findAccessData(Event::$LOCATION_NAVIGATE, "导航站", $pv, $uv)
        );
    }

    /**
     * 封装页面访问数据
     * @param $location string 统计项location
     * @param $name string 前端展示名称
     * @param $pv Collection pv 数据列表
     * @param $uv Collection uv 数据列表
     * @return stdClass
     */
    private function findAccessData($location, $name, $pv, $uv)
    {
        $result = new StdClass();
        foreach ($pv as $pvItem) {
            if (strcmp($pvItem->location, $location) == 0) {
                $result->pv = $pvItem->pv;
                break;
            }
        }
        foreach ($uv as $uvItem) {
            if (strcmp($uvItem->location, $location) == 0) {
                $result->uv = $uvItem->uv;
                break;
            }
        }
        $result->name = $name;
        return $result;
    }
}
