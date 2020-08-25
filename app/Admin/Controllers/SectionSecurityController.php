<?php

namespace App\Admin\Controllers;

use App\SectionSecurity;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class SectionSecurityController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '安全驾驶_节管理';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new SectionSecurity());
        $grid->model()->latest();
        $grid->column('id', __('索引'))->sortable();
        $grid->column('section_title',  __('节名称'));
        $grid->column('chapters.chapter_title',     __('所属章'));
        $grid->column('section_sort',   __('排序权重'))->label()->sortable();
        $grid->column('section_open',   __('开启状态'))->switch();
        $grid->column('created_at',     __('创建时间'));

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
        $show = new Show(SectionSecurity::findOrFail($id));

        $show->field('section_title', __('节名称'));
        $show->field('chapter_id', __('所属章'));
        $show->field('section_sort', __('排序权重'));
        $show->field('section_open', __('开启状态'));
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
        $form = new Form(new SectionSecurity());

        $form->text('section_title', __('节名称'));

        $form->select('chapter_id', '所属章')->options(\App\ChapterSecurity::where('chapter_open', '1')->get()->pluck('chapter_title', 'id'));

        $form->number('section_sort', __('排序权重'))->default(1);
        $form->switch('section_open', __('开启状态'))->default(1);

        return $form;
    }
}
