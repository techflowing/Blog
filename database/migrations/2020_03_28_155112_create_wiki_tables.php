<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

/**
 * 创建Wiki 相关Table
 * Class CreateWikiTables
 */
class CreateWikiTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('wiki_project', function (Blueprint $table) {
            $table->increments('id')->comment('项目ID');
            $table->string('name')->comment('项目名称');
            $table->string('description', 2000)->nullable(true)->comment('项目描述');
            $table->integer('type')->comment('项目类型，1-公开/ 0-私密');
            $table->integer('doc_count')->default(0)->comment('文档数量');
            $table->timestamps();
        });
        Schema::create('wiki_document', function (Blueprint $table) {
            $table->increments('id')->comment('文档ID');
            $table->string('name')->comment('文档名称');
            $table->integer('type')->comment('类型，1-文件夹/ 0-文档');
            $table->integer('parent_id')->comment('父级ID');
            $table->longText('content')->comment('文档内容');
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
        Schema::dropIfExists('wiki_project');
        Schema::dropIfExists('wiki_document');
    }
}
