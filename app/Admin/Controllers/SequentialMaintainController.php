<?php

namespace App\Admin\Controllers;

use App\SequentialMaintain;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

use Encore\Admin\Layout\Content;

class SequentialMaintainController extends AdminController
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
        $grid = new Grid(new SequentialMaintain());

        $grid->column('id', __('索引'));
        
        $grid->column('title', __('章节标题'));

        $grid->column('exercises.title', __('顺序练习'));

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
        $show = new Show(SequentialMaintain::findOrFail($id));

        $show->field('title', __('章节标题'));

        $show->field('exercise_id', __('顺序练习'));

        $show->field('open', __('状态'));

        $show->field('sort', __('排序'));

        $show->field('created_at', __('创建时间'));

        $show->field('updated_at', __('更新时间'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new SequentialMaintain());

        $form->text('title', __('章节标题'));

        $form->select('exercise_id', __('顺序练习'))->options(\App\SequentialExercise::pluck('title', 'id')->toArray());

        $form->switch('open', __('状态'))->default(1);

        $form->number('sort', __('排序权重'))->default(0);

        return $form;
    }
}
