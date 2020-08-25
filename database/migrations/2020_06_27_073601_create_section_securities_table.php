<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSectionSecuritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('section_securities', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('section_title')->comment('节名称');

            $table->integer('chapter_id')->default(1)->comment('所属章');

            $table->integer('section_sort')->default(1)->comment('排序');

            $table->tinyInteger('section_open')->default(1)->comment('状态');

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
        Schema::dropIfExists('section_securities');
    }
}
