<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMaintainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('maintains', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->string('title')->comment('标题');

            $table->string('thumb')->nullable()->comment('封面');

            $table->string('media')->nullable()->comment('视频地址');

            $table->tinyInteger('active')->default(1)->comment('状态');

            $table->integer('section_id')->comment('所属节');

            $table->integer('views')->default(0)->comment('观看人数');

            $table->integer('factorys')->default(0)->comment('收藏人数');

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
        Schema::dropIfExists('maintains');
    }
}
