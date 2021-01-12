<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSecretMaintainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('secret_maintains', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('title')->nullable()->comment('章节标题');

            $table->integer('exercise_id')->default(1)->comment('所属练习ID');

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
        Schema::dropIfExists('secret_maintains');
    }
}
