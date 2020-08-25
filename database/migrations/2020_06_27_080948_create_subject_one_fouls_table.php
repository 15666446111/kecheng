<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectOneFoulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_one_fouls', function (Blueprint $table) {
            
            $table->bigIncrements('id');

            $table->text('title')->nullable()->comment('题干');

            $table->tinyInteger('car')->default(1)->comment('所属车型: 1小车 2客车 3货车 4摩托');

            $table->tinyInteger('type')->default(1)->comment('题型，1单选， 2多远 3判断');

            $table->integer('category')->default(1)->comment('分类');

            $table->string('option_a')->nullable()->comment('选项a');

            $table->string('option_b')->nullable()->comment('选项b');

            $table->string('option_c')->nullable()->comment('选项c');

            $table->string('option_d')->nullable()->comment('选项d');

            $table->string('answer')->nullable()->default('A')->comment('答案');

            $table->text('analysis')->nullable()->comment('解析');

            $table->text('jiqiao')->nullable()->comment('技巧');

            $table->string('analysis_video')->nullable()->comment('视频解析地址');

            $table->string('analysis_audio')->nullable()->comment('音频解析地址');

            $table->string('analysis_image')->nullable()->comment('帮助图片地址');

            $table->integer('sort')->default(1)->comment('排序');

            $table->tinyInteger('open')->default(1)->comment('状态');

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
        Schema::dropIfExists('subject_one_fouls');
    }
}
