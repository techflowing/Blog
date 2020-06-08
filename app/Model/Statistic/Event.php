<?php

namespace App\Model\Statistic;

use Illuminate\Database\Eloquent\Model;

/**
 * 事件统计表，仅统计IP，粗略统计，非准确数据
 */
class Event extends Model
{
    /*** 事件名称 ***/

    /** 访问记录 */
    public static $NAME_ACCESS = "access";

}
