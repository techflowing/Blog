<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateXMindTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('xmind_map', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable(false);
            $table->integer('type')->default(0)->comment('项目类型，1-公开/ 0-私密');
            $table->longText('content')->nullable(true);
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
        Schema::dropIfExists('xmind_map');
    }
}
