<?php


namespace App\Model\Statistic;


use Illuminate\Database\Eloquent\Model;

class UV extends Model
{
    protected $table = 'statistic_uv';

    protected $fillable = ['scene', 'location'];
}
