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
    // 科二科三 地区列表
    $router->resource('subject-two-three-areas', SubjectTwoThreeAreaController::class);


    /**
     * 顺序练习
     */
    $router->resource('sequential-exercises', SequentialExerciseController::class);         // 顺序练习 地区 车型
    $router->resource('sequential-maintains', SequentialMaintainController::class);         // 顺序练习 章节列表
    $router->resource('sequential-questions', SequentialQuestionController::class);         // 顺序练习。题库列表

    /**
     * 保过600题目
     */
    $router->resource('six-exercises', SixExerciseController::class);               // 保过600题  地区车型
    $router->resource('six-maintains', SixMaintainController::class);               // 保过600题  章节列表
    $router->resource('six-questions', SixQuestionController::class);               // 保过600题  问题列表


    /**
     * 懒人速学
     */
    $router->resource('lrsx-exercises', LrsxExerciseController::class);
    $router->resource('lrsx-maintains', LrsxMaintainController::class);
    $router->resource('lrsx-questions', LrsxQuestionController::class);

    
    /**
     * 三力测试
     */
    $router->resource('sanli-exercises', SanliExerciseController::class);
    $router->resource('sanli-maintains', SanliMaintainController::class);
    $router->resource('sanli-questions', SanliQuestionController::class);


    
    /**
     * 超级攻略
     */
    $router->resource('super-strategies', SuperStrategyController::class);          // 超级攻略
    $router->resource('super-maintains', SuperMaintainsController::class);          // 章节列表
    $router->resource('super-courses', SuperCourseController::class);               // 课件列表


    $router->get('/form/{id}', ModelSetting::class);


    // 车型管理
    $router->resource('cars', CarController::class);
    
    // 地区管理
    $router->resource('cities', CityController::class);
    $router->resource('provinces', ProvinceController::class);
});
