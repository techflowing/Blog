<?php

namespace App\Model\Event;

/**
 * 访问记录事件统计
 * Class VisitorEvent
 * @package App\Model\Event
 */
class VisitorEvent extends BaseEvent
{
    /**
     * @var string 设备
     */
    var $device;
    /**
     * @var string 平台
     */
    var $platform;
    /**
     * @var string 浏览器
     */
    var $browser;

    public function __construct($name, $scene, $location, $ip, $content, $date, $device, $platform, $browser)
    {
        parent::__construct($name, $scene, $location, $ip, $content, $date);
        $this->device = $device;
        $this->platform = $platform;
        $this->browser = $browser;
    }
}
