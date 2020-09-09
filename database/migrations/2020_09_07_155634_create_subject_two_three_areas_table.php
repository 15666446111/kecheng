<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectTwoThreeAreasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_two_three_areas', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->string('prov_id')->comment('省份');

            $table->string('city_id')->comment('城市');

            $table->string('title')->comment('标题');

            $table->string('thumb')->comment('缩略图');

            $table->string('desc')->comment('描述');

            $table->bigInteger('study_count')->default(0)->comment('初始学习次数');

            $table->bigInteger('favouer_count')->default(0)->comment('初始收藏次数');

            $table->smallInteger('open')->default(1)->comment('状态');

            $table->integer('sort')->default(1)->comment('排序权重');

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
        Schema::dropIfExists('subject_two_three_areas');
    }
}
