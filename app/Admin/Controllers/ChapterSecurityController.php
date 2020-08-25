<?php

namespace App\Admin\Controllers;

use App\ChapterSecurity;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class ChapterSecurityController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '安全驾驶_章管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new ChapterSecurity());
        $grid->model()->latest();
        $grid->column('id', __('索引'))->sortable();
        $grid->column('chapter_title', __('章名称'));
        $grid->column('chapter_sort', __('排序权重'))->label()->sortable();
        $grid->column('chapter_open', __('状态'))->switch();
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
        $show = new Show(ChapterSecurity::findOrFail($id));

        $show->field('chapter_title', __('章名称'));
        $show->field('chapter_sort', __('排序权重'));
        $show->field('chapter_open', __('开启状态'));
        $show->field('created_at', __('创建时间'));
        $show->field('updated_at', __('修改时间'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new ChapterSecurity());
        
        $form->text('chapter_title', __('章名称'));

        $form->number('chapter_sort', __('章排序'))->default(1);
        
        $form->switch('chapter_open', __('是否开启'))->default(1);

        return $form;
    }
}
