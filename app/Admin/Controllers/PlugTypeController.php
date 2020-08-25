<?php

namespace App\Admin\Controllers;

use App\PlugType;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PlugTypeController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '轮播图类型';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new PlugType());
        $grid->model()->latest();
        $grid->column('id', __('索引'));
        $grid->column('name', __('标题'));
        $grid->column('active', __('状态'))->switch();
        $grid->column('created_at', __('创建时间'));
        //$grid->column('updated_at', __('Updated at'));
        //
        $grid->disableCreateButton(false);

        $grid->filter(function($filter){
            // 去掉默认的id过滤器
            $filter->disableIdFilter();

            $filter->column(1/4, function ($filter) {
                $filter->like('name', '类型');
            });

        });
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
        $show = new Show(PlugType::findOrFail($id));

        $show->field('id', __('索引'));
        $show->field('name', __('标题'));
        $show->field('active', __('状态'));
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
        $form = new Form(new PlugType());

        $form->text('name', __('标题'));
        $form->switch('active', __('状态'))->default(1);

        return $form;
    }
}
