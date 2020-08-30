<?php

namespace App\Admin\Controllers;

use App\SuperCourse;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SuperCourseController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '课件信息';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new SuperCourse());

        $grid->column('id', __('Id'));
        $grid->column('title', __('Title'));
        $grid->column('media', __('Media'));
        $grid->column('maintains_id', __('Maintains id'));
        $grid->column('open', __('Open'));
        $grid->column('sort', __('Sort'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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
        $show = new Show(SuperCourse::findOrFail($id));

        $show->field('id', __('Id'));
        $show->field('title', __('Title'));
        $show->field('media', __('Media'));
        $show->field('maintains_id', __('Maintains id'));
        $show->field('open', __('Open'));
        $show->field('sort', __('Sort'));
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
        $form = new Form(new SuperCourse());

        $form->text('title', __('课件标题'));

        $form->file('media', __('课件文件'))->uniqueName()->move('cjgl/media');

        $form->select('maintains_id', __('所属章节'))->options(\App\SuperMaintains::pluck('title', 'id')->toArray());

        $form->switch('open', __('是否开启'))->default(1);

        $form->number('sort', __('排序权重'))->default(1);

        return $form;
    }
}
