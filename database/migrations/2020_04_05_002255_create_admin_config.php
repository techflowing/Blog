<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 配置相关数据库创建
 * Class CreateAdminConfig
 */
class CreateAdminConfig extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_nav_menu_config', function (Blueprint $table) {
            $table->increments('id')->comment('自增ID');
            $table->string('name')->nullable(false)->comment('菜单名称');
            $table->string("path")->nullable(false)->unique()->comment('访问路径');
            $table->integer('order')->default(100)->comment('顺序');
            $table->integer('target')->default(0)->comment('0:原窗口打开；1:新窗口打开');
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
        Schema::dropIfExists('admin_nav_menu_config');
    }
}
