<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlugTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plug_types', function (Blueprint $table) {

            $table->bigIncrements('id');
            
            $table->string('name')->nullable()->comment('类型名称');

            $table->tinyInteger('active')->default(1)->comment('开启状态');

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
        Schema::dropIfExists('plug_types');
    }
}
