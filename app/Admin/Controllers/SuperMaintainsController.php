<?php

namespace App\Admin\Controllers;

use App\SuperMaintains;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SuperMaintainsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '章节列表';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new SuperMaintains());

        $grid->column('id', __('索引'));
        
        $grid->column('title', __('章节标题'));

        $grid->column('strategies.title', __('所属攻略'));

        $grid->column('open', __('状态'))->switch();

        $grid->column('sort', __('排序'))->label()->sortable();

        $grid->column('created_at', __('创建时间'));

        //$grid->column('updated_at', __('Updated at'));

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(SuperMaintains::findOrFail($id));

        $show->field('title', __('章节标题'));

        $show->field('strategies_id', __('所属攻略'));

        $show->field('open', __('状态'));

        $show->field('sort', __('排序'));

        $show->field('created_at', __('创建时间'));

        $show->field('updated_at', __('更新时间'));


        $show->courses('课件列表', function ($courses) {

            $courses->resource('/admin/super-courses');

            $courses->id('索引');

            $courses->column('title', __('课件标题'));

            $courses->media('课件文件')->link();

            $courses->sort('排序权重')->sortable()->editable();

            $courses->filter(function ($filter) {
                //$filter->like('content');
            });
        });


        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new SuperMaintains());

        $form->text('title', __('章节标题'));

        $form->select('strategies_id', __('所属攻略'))->options(\App\SuperStrategy::pluck('title', 'id')->toArray());

        $form->switch('open', __('状态'))->default(1);

        $form->number('sort', __('排序权重'))->default(0);

        return $form;
    }
}
