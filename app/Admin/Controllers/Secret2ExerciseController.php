<?php

namespace App\Admin\Controllers;

use App\Secret2Exercise;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class Secret2ExerciseController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '考前密卷二 地区车型';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Secret2Exercise());

        $grid->column('title', __('标题'));
        $grid->column('thumb', __('封面'))->image('', 40);
        $grid->column('study_count', __('学习次数'))->label()->sortable();
        $grid->column('favouer_count', __('收藏次数'))->label()->sortable();
        $grid->column('citys.name', __('地区'));
        $grid->column('cars_relation.title', __('车型'));
        $grid->column('subject_id', __('科目'))->sortable()->using([1 => '科目1', 4 => '科目4'])->dot([1=> 'success', 4=> 'danger']);
        $grid->column('desc', __('描述'));
        $grid->column('created_at', __('创建时间'));

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
        $show = new Show(Secret2Exercise::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('thumb', __('Thumb'));
        $show->field('study_count', __('Study count'));
        $show->field('favouer_count', __('Favouer count'));
        $show->field('area', __('Area'));
        $show->field('car_type', __('Car type'));
        $show->field('subject_id', __('Subject id'));
        $show->field('desc', __('Desc'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Secret2Exercise());

        $form->text('title', __('Title'));
        $form->text('thumb', __('Thumb'));
        $form->number('study_count', __('Study count'));
        $form->number('favouer_count', __('Favouer count'));
        $form->number('area', __('Area'));
        $form->number('car_type', __('Car type'));
        $form->number('subject_id', __('Subject id'))->default(1);
        $form->textarea('desc', __('Desc'));

        return $form;
    }
}
