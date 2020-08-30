<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuperStrategiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('super_strategies', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->string('title')->comment('标题');

            $table->string('thumb')->nullable()->comment('封面');

            $table->bigInteger('study_count')->default(0)->comment('初始学习次数');

            $table->bigInteger('favouer_count')->default(0)->comment('初始收藏次数');

            $table->integer('car_type')->default(0)->comment('车型');

            $table->integer('subject_id')->default(1)->comment('科目');

            $table->text('desc')->nullable()->comment('说明');

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
        Schema::dropIfExists('super_strategies');
    }
}
