<?php

namespace App\Model\wiki;

use Illuminate\Database\Eloquent\Model;

/**
 * Wiki 项目Model
 * Class WikiProject
 * @package App\Model\wiki
 */
class WikiProject extends Model
{
    public static $TYPE_PRIVATE = 0;
    public static $TYPE_PUBLIC = 1;

    protected $table = 'wiki_project';
}
