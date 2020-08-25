<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectTwoThreeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_two_three', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->string('title')->nullable()->comment('标题');

            $table->tinyInteger('subject')->default(2)->comment('科目');

            $table->string('video_url')->nullable()->comment('视频地址');

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
        Schema::dropIfExists('subject_two_three');
    }
}
