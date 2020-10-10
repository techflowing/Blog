<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXMindCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create("xmind_categories", function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->default(0);
            $table->integer('order')->default(0);
            $table->string('title', 50);
            $table->string('icon', 20);
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
        Schema::dropIfExists('xmind_categories');
    }
}
