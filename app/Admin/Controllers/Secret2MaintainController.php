<?php

namespace App\Admin\Controllers;

use App\Secret2Maintain;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class Secret2MaintainController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '考前密卷二 章节列表';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Secret2Maintain());

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
        $show = new Show(Secret2Maintain::findOrFail($id));

        $show->field('title', __('章节标题'));

        $show->field('exercise_id', __('顺序练习'));

        $show->field('open', __('状态'));

        $show->field('sort', __('排序'));

        $show->field('created_at', __('创建时间'));

        $show->field('updated_at', __('更新时间'));

        $show->questions('题目列表', function ($questions) {

            $questions->resource('/admin/secret2-questions');

            $questions->id('索引');

            $questions->column('subjects.title', __('问题'))->display(function ($title) {
                return strip_tags($title);
            })->limit(50)->help('这一列是问题的题干');

            $questions->sort('排序权重')->sortable()->editable();

            $questions->filter(function ($filter) {
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
        $form = new Form(new Secret2Maintain());

        $form->text('title', __('Title'));
        $form->number('exercise_id', __('Exercise id'))->default(1);
        $form->switch('open', __('Open'))->default(1);
        $form->number('sort', __('Sort'));

        return $form;
    }
}
