<?php

namespace App\Model\Event;

/**
 * 事件统计表，仅统计IP，粗略统计，非准确数据
 */
class Event
{
    /*** 事件名称，访问记录 ***/
    public static $NAME_VISITOR = "visitor";

    /**scene值*/
    public static $SCENE_MAIN_PAGE = "main_page";

    /**location 值*/
    public static $LOCATION_WELCOME = "welcome";
    public static $LOCATION_BLOG = "blog";
    public static $LOCATION_WIKI = "wiki";
    public static $LOCATION_NAVIGATE = "navigate";
    public static $LOCATION_ABOUT = "about";
}
