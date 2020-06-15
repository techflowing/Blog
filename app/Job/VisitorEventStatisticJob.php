<?php


namespace App\Job;

use App\Model\Event\VisitorEvent;
use App\Model\Statistic\PV;
use App\Model\Statistic\UV;

/**
 * 网站访问事件统计
 * Class VisitorEventJob
 * @package App\Job
 */
class VisitorEventStatisticJob extends EventStatisticsJob
{

    var $visitorEvent;

    /**
     * VisitorEventStatisticJob constructor.
     * @param VisitorEvent $event 访问事件
     */
    public function __construct(VisitorEvent $event)
    {
        $this->visitorEvent = $event;
    }

    public function handle()
    {
        // 判断当前IP今日是否已访问
        $hasVisitor = $this->visitorEvent->hasVisited();
        // 存储到事件总表
        $content = [];
        $content['device'] = $this->visitorEvent->device;
        $content['platform'] = $this->visitorEvent->platform;
        $content['browser'] = $this->visitorEvent->browser;
        $this->visitorEvent->content = json_encode($content);
        $this->visitorEvent->recordEvent();
        // 更新PV数据
        $pvModel = PV::firstOrCreate(
            [
                'scene' => $this->visitorEvent->scene,
                'location' => $this->visitorEvent->location,
            ]
        );
        $pvModel->pv = $pvModel->pv + 1;
        $pvModel->save();
        // 更新UV数据
        if (!$hasVisitor) {
            $uvModel = UV::firstOrCreate(
                [
                    'scene' => $this->visitorEvent->scene,
                    'location' => $this->visitorEvent->location,
                ]
            );
            $uvModel->uv = $uvModel->uv + 1;
            $uvModel->save();
        }
    }
}
