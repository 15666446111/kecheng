<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddInfoToSubjectOneFoulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subject_one_fouls', function (Blueprint $table) {
            //
            $table->tinyInteger('subject')->default(1)->comment('所属科目: 1科一 4科目4');
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
