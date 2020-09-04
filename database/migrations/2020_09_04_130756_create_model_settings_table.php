<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateModelSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_settings', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->string('thumb')->nullable();

            $table->string('title')->nullable();

            $table->integer('locks')->default(0)->comment('观看次数');

            $table->integer('favs')->default(0)->comment('收藏次数');

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
        Schema::dropIfExists('model_settings');
    }
}
