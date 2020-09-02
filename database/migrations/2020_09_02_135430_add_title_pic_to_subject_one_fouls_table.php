<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTitlePicToSubjectOneFoulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subject_one_fouls', function (Blueprint $table) {
            
            $table->string('title_pic')->nullable()->comment('题干图片')->after('title');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subject_one_fouls', function (Blueprint $table) {
            //
        });
    }
}
