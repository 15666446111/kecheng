<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFilesToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            
            $table->string('openid')->comment('微信授权openid')->after('id');

            $table->string('avatar')->nullable()->comment('头像')->after('name');
            $table->bigInteger('blance')->default(0)->comment('用户余额')->after('avatar');
            $table->smallInteger('group')->default(1)->comment('用户组, 1=学员')->after('blance');

            $table->string('provinces')->nullable()->comment('省份')->after('password');
            $table->string('city')->nullable()->comment('城市')->after('provinces');

            $table->string('last_ip')->nullable()->comment('最后登陆ip')->after('remember_token');
            $table->string('last_time')->nullable()->comment('最后登陆时间')->after('last_ip');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
