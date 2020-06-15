<?php

namespace App\Model\Event;

use Illuminate\Database\Eloquent\Model;

/**
 * 事件统计
 * Class Event
 * @package App\Model
 */
class BaseEvent
{
    var $name;
    var $scene;
    var $location;
    var $ip;
    var $content;
    var $date;

    /**
     * BaseEvent constructor.
     * @param $name string 事件名称
     * @param $scene string 场景值
     * @param $location string 二级分类定义
     * @param $ip string 来源IP地址
     * @param $content string 埋点内容
     * @param $date string 访问时间，格式：Y-m-d
     */
    public function __construct($name, $scene, $location, $ip, $content, $date)
    {
        $this->name = $name;
        $this->scene = $scene;
        $this->location = $location;
        $this->ip = $ip;
        $this->content = $content;
        $this->date = $date;
    }

    /**
     * 存储
     */
    function recordEvent()
    {
        $model = new EventModel();
        $model->name = $this->name;
        $model->scene = $this->scene;
        $model->location = $this->location;
        $model->ip = $this->ip;
        $model->content = $this->content;
        $model->date = $this->date;
        $model->save();
    }

    /**
     * 判断当前IP是否已经访问过
     */
    function hasVisited()
    {
        $model = EventModel::where('name', '=', Event::$NAME_VISITOR)
            ->where('scene', '=', $this->scene)
            ->where('location', '=', $this->location)
            ->where('ip', '=', $this->ip)
            ->where('date', '=', $this->date)
            ->first();
        return !empty($model);
    }
}

class EventModel extends Model
{
    protected $table = 'statistic_event';
}
