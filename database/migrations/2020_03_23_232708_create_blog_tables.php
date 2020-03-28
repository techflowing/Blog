<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBlogTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // 创建文章信息表
        Schema::create('blog_articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('description', 2000);
            // content内容标识，映射到具体存储文件，博客文章以文件形式存储
            $table->string('content_identity');
            $table->string('category_id');
            $table->timestamps();
        });
        // 创建文章分类表
        Schema::create('blog_categories', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
        });
        // 创建文章标签表
        Schema::create('blog_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name')->unique();
        });
        // 创建文章和标签的关系表
        Schema::create('blog_r_article_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_id');
            $table->integer('tag_id');
        });
        // 创建文章标识和真实路径的映射关系表
        Schema::create('blog_r_identify_path', function (Blueprint $table) {
            $table->increments('id');
            // 此字段存于文件内，文件夹结构变动后需要重建此表
            $table->string('identity')->unique();
            $table->string('path');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('blog_articles');
        Schema::dropIfExists('blog_categories');
        Schema::dropIfExists('blog_tags');
        Schema::dropIfExists('blog_r_article_tag');
        Schema::dropIfExists('blog_r_identify_path');
    }
}
