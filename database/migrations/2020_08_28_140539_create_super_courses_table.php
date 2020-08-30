<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSuperCoursesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('super_courses', function (Blueprint $table) {
            
            $table->bigIncrements('id');

            $table->string('title')->comment('课件标题');

            $table->string('media')->comment('课件文件');

            $table->integer('maintains_id')->default(1)->comment('所属章节');

            $table->tinyInteger('open')->default(1)->comment('是否开启');

            $table->integer('sort')->default(0)->comment('排序权重');

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
        Schema::dropIfExists('super_courses');
    }
}
