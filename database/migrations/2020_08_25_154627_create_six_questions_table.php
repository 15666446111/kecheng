<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSixQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('six_questions', function (Blueprint $table) {

            $table->bigIncrements('id');
            
            $table->integer('maintain_id')->comment('章节id');

            $table->integer('question_id')->comment('题目id');

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
        Schema::dropIfExists('_six_questions');
    }
}
