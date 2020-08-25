<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChapterMaintainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chapter_maintains', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->string('chapter_title')->comment('章名称');

            $table->integer('chapter_sort')->default(1)->comment('排序');

            $table->tinyInteger('chapter_open')->default(1)->comment('状态');

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
        Schema::dropIfExists('chapter_maintains');
    }
}
