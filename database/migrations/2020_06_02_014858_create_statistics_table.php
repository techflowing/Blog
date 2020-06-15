<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 创建埋点统计相关表
 * Class CreateStatisticsTable
 */
class CreateStatisticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('statistic_event', function (Blueprint $table) {
            $table->increments('id')->comment("自增ID");
            $table->string('name')->nullable(false)->comment("统计时间名称");
            $table->string('scene')->nullable(false)->comment("场景值");
            $table->string('location')->nullable(false)->comment("位置（二级分类）");
            $table->string('ip')->nullable(true)->comment("用户IP");
            $table->string('content')->nullable(true)->comment("自定义统计内容");
            $table->string('date')->nullable(false)->comment("访问日期，格式 Y-m-d");
            $table->timestamps();
        });

        Schema::create('statistic_uv', function (Blueprint $table) {
            $table->increments('id')->comment("自增ID");
            $table->string('scene')->nullable(false)->comment("场景值");
            $table->string('location')->nullable(false)->comment("位置（二级分类）");
            $table->integer('uv')->default(0)->comment("UV数");
            $table->timestamps();
        });

        Schema::create('statistic_pv', function (Blueprint $table) {
            $table->increments('id')->comment("自增ID");
            $table->string('scene')->nullable(false)->comment("场景值");
            $table->string('location')->nullable(false)->comment("位置（二级分类）");
            $table->integer('pv')->default(0)->comment("PV数");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('statistic_event');
        Schema::dropIfExists('statistic_uv');
        Schema::dropIfExists('statistic_pv');
    }
}
