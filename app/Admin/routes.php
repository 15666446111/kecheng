<?php

use Illuminate\Routing\Router;

Admin::routes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index')->name('admin.home');


    // 轮播类型管理
    $router->resource('plug-types', PlugTypeController::class);
    // 轮播图管理
    $router->resource('plugs', PlugController::class);


    /** 会员管理 **/
    $router->resource('users', UserController::class);




    // 汽车保养 章管理
    $router->resource('chapter-maintains', ChapterMaintainController::class);
    // 汽车保养 节管理
    $router->resource('section-maintains', SectionMaintainController::class);
    // 汽车保养 课程管理
    $router->resource('maintains', MaintainController::class);

    // 安全驾驶
    $router->resource('chapter-securities', ChapterSecurityController::class);
    $router->resource('section-securities', SectionSecurityController::class);
    $router->resource('securities', SecurityController::class);

    // 科目一 科目四管理
    $router->resource('subject-one-fours', SubjectOneFourController::class);
    // 科目二 科目三管理
    $router->resource('subject-two-threes', SubjectTwoThreeController::class);



    /**
     * 顺序练习
     */
    $router->resource('sequential-exercises', SequentialExerciseController::class);         // 顺序练习 地区 车型
    $router->resource('sequential-maintains', SequentialMaintainController::class);         // 顺序练习 章节列表

    // 车型管理
    $router->resource('cars', CarController::class);
    
    // 地区管理
    $router->resource('cities', CityController::class);
    $router->resource('provinces', ProvinceController::class);
});