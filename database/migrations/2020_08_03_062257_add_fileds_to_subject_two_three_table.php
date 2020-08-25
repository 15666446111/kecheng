<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFiledsToSubjectTwoThreeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('subject_two_three', function (Blueprint $table) {
             
            $table->string('thumb')->nullable()->comment('封面')->after('video_url');

            $table->string('description')->nullable()->comment('描述')->after('thumb');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('subject_two_three', function (Blueprint $table) {
            //
        });
    }
}
