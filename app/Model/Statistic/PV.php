<?php

namespace App\Model\Statistic;

use Illuminate\Database\Eloquent\Model;

/**
 * PV 统计表
 * @package App\Model\Statistic
 */
class PV extends Model
{
    protected $table = 'statistic_pv';

    protected $fillable = ['scene', 'location'];
}
