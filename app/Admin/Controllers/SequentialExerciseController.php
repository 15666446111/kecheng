<?php

namespace App\Admin\Controllers;

use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\SequentialExercise;
use Encore\Admin\Controllers\AdminController;

class SequentialExerciseController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '顺序练习';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new SequentialExercise());

        $grid->column('title', __('标题'));
        $grid->column('thumb', __('封面'))->image('', 40);
        $grid->column('study_count', __('学习次数'))->label()->sortable();
        $grid->column('favouer_count', __('收藏次数'))->label()->sortable();
        $grid->column('citys.name', __('地区'));
        $grid->column('cars_relation.title', __('车型'));
        $grid->column('subject_id', __('科目'))->sortable()->using([1 => '科目1', 4 => '科目4'])->dot([1=> 'success', 4=> 'danger']);
        $grid->column('desc', __('描述'));
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
        $show = new Show(SequentialExercise::findOrFail($id));

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
        $form = new Form(new SequentialExercise());

        $form->text('title', __('练习标题'));

        $form->file('thumb', __('封面图片'))->required()->uniqueName()->move('sxlx/images');

        $form->number('study_count', __('学习次数'))->default(0);

        $form->number('favouer_count', __('收藏次数'))->default(0);

        $form->select('provinces', __('省份'))->options(\App\Province::pluck('name', 'id')->toArray())->load('area', '/api/city');

        $form->select('area', __('城市'));

        $form->select('car_type', '车型')->options(\App\Car::pluck('title', 'id')->toArray());

        $form->select('subject_id', __('科目'))->options([1=>'科目1', 4=>'科目4']);

        $form->textarea('desc', __('描述'));

        $form->ignore('provinces');

        return $form;
    }
}
