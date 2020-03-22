<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavigationTables extends Migration
{

    public function up()
    {
        Schema::create("navigation_categories", function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->default(0);
            $table->integer('order')->default(0);
            $table->string('title', 50);
            $table->string('icon', 20);
            $table->timestamps();
        });

        Schema::create('navigation_sites', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order')->default(10000);
            $table->integer('category_id');
            $table->string('title', 50);
            $table->string('thumb', 200)->nullable();
            $table->string('describe', 300);
            $table->string('url', 250);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('navigation_categories');
        Schema::dropIfExists('navigation_sites');
    }
}
