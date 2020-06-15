<?php


namespace App\Util;

use App\Job\VisitorEventStatisticJob;
use App\Model\Event\Event;
use App\Model\Event\VisitorEvent;
use Illuminate\Support\Facades\Request;
use Jenssegers\Agent\Facades\Agent;

/**
 * 统计相关工具类
 * Class StatisticUtil
 * @package App\Util
 */
class StatisticUtil
{

    /**
     * 记录访问事件
     * @param string $scene 场景值
     * @param string $location 二级分类
     */
    static function recordVisitorEvent($scene, $location)
    {
        $event = new VisitorEvent(Event::$NAME_VISITOR,
            $scene,
            $location,
            Request::getClientIp(),
            "",
            date('Y-m-d'),
            Agent::device(),
            Agent::platform(),
            Agent::browser());
        dispatch(new VisitorEventStatisticJob($event));
    }
}
